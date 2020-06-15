<?php

namespace App\Http\Controllers;

use App\DataTables\StageDataTable;
use App\DataTables\MesStagesDataTable;
use App\Http\Requests\CreateStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Repositories\StageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;
use App\Repositories\UserRepository;
use App\Util\StateUtil;
use App\Models\ChoixEtudiant;

class StageController extends AppBaseController
{
    /** @var  StageRepository */
    private $stageRepository;
    private $userRepository;

    public function __construct(StageRepository $stageRepo
            , UserRepository $userRepository)
    {
        $this->stageRepository = $stageRepo;
        $this->userRepository  = $userRepository;
        $this->middleware('auth');
        $this->middleware('admin')->only(['create']);
        $this->middleware('etudiant')->only(['mesStages']);
    }

    /**
     * Display a listing of the Stage.
     *
     * @param StageDataTable $stageDataTable
     * @return Response
     */
    public function index(StageDataTable $stageDataTable)
    {
        $role = session('role');
        if($role == 'etudiant') {
            return redirect('/');
        }
        $roleId = session('role_id');
        if($role == 'professeur') {
            $stageDataTable->with('role' , $roleId);
        }
        return $stageDataTable->render('stages.index' , compact('roleId' , 'role'));
    }

    public function mesStages(MesStagesDataTable $dataTable) {
        return $dataTable->render('stages.mes_stages');
    }
    /**
     * Show the form for creating a new Stage.
     *
     * @return Response
     */
    public function create(\App\User $student)
    {
        $lastStage = $this->stageRepository->getLastStage($student->id);
        if($lastStage && $lastStage->phase < StateUtil::$FINAL_EDITION_PART) {
            Flash::error('Cet étudiant a déjà un stage en cours');
            return redirect(route('etudiants.index'));
        }
        $annees = \App\Models\Annee::all();
        $teachers = $this->userRepository->getTeachers();
        $filieres = \App\Models\Filiere::all();
        $enterprises = \App\Models\Entreprise::all();
        return view('stages.create' ,
                compact('enterprises','teachers' , 'student' , 'annees' , 'filieres'));
    }

    /**
     * Store a newly created Stage in storage.
     *
     * @param CreateStageRequest $request
     *
     * @return Response
     */
    public function store(CreateStageRequest $request)
    {
        $inputs = $request->all();
        $inputs['phase'] = StateUtil::$INIT_PHASE;
        $message = 'Stage enregistré avec succès.';

        $this->stageRepository->create($inputs);
        ChoixEtudiant::where('etudiant_id', $inputs['etudiant_id'])->delete();
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        
        Flash::success($message);

        return redirect(route('stages.index'));
    }

    /**
     * Display the specified Stage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            Flash::error('Stage introuvable');

            return redirect(route('stages.index'));
        }

        return view('stages.show')->with('stage', $stage);
    }

    /**
     * Show the form for editing the specified Stage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            Flash::error('Stage introuvable');

            return redirect(route('stages.index'));
        }

        return view('stages.edit')->with('stage', $stage);
    }

    /**
     * Update the specified Stage in storage.
     *
     * @param  int              $id
     * @param UpdateStageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStageRequest $request)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            Flash::error('Stage introuvable');

            return redirect(route('stages.index'));
        }
        $message = 'Stage mis à jour avec succès.';

        $stage = $this->stageRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('stages.index'));
    }

    /**
     * Remove the specified Stage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stage = $this->stageRepository->find($id);

        if (empty($stage)) {
            Flash::error('Stage not found');

            return redirect(route('stages.index'));
        }

        $this->stageRepository->delete($id);
        $message = 'Stage supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('stages.index'));
    }
    
    public function statPhase() {
        $phases = [];
        for($i = 1; $i <= 5; $i++) {
            $phases[$i] = $this->stageRepository->getByPhase($i);
        }
        return view('stages/stats')->withPhases($phases);
    }
}

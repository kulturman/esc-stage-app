<?php

namespace App\Http\Controllers;

use App\DataTables\ProfesseurDataTable;
use App\Http\Requests\CreateProfesseurRequest;
use App\Http\Requests\UpdateProfesseurRequest;
use App\Repositories\ProfesseurRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;
use App\Util\Util;
use App\Models\Professeur;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\ChoixEtudiant;
use Illuminate\Support\Facades\Auth;

class ProfesseurController extends AppBaseController
{
    /** @var  ProfesseurRepository */
    private $professeurRepository;

    public function __construct(ProfesseurRepository $professeurRepo)
    {
        $this->professeurRepository = $professeurRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Professeur.
     *
     * @param ProfesseurDataTable $professeurDataTable
     * @return Response
     */
    public function index(ProfesseurDataTable $professeurDataTable)
    {
        return $professeurDataTable->render('professeurs.index');
    }

    /**
     * Show the form for creating a new Professeur.
     *
     * @return Response
     */
    public function create()
    {
        return view('professeurs.create')->withModules(\App\Models\Module::all());
    }

    /**
     * Store a newly created Professeur in storage.
     *
     * @param CreateProfesseurRequest $request
     *
     * @return Response
     */
    public function store(CreateProfesseurRequest $request)
    {
        $inputs = $request->all();
        $inputs['role_id'] = Util::$PROFESSOR_ID;
        $inputs['password'] = bcrypt('123456');
        $message = 'Professeur enregistré avec succès.';

        $professeur = $this->professeurRepository->create($inputs);
        $professeur->modules()->attach($inputs['modules']);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('professeurs.index'));
    }

    /**
     * Display the specified Professeur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $professeur = $this->professeurRepository->find($id);

        if (empty($professeur)) {
            Flash::error('Professeur introuvable');

            return redirect(route('professeurs.index'));
        }

        return view('professeurs.show')->with('professeur', $professeur);
    }

    /**
     * Show the form for editing the specified Professeur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $professeur = $this->professeurRepository->find($id);
        if (empty($professeur)) {
            Flash::error('Professeur introuvable');

            return redirect(route('professeurs.index'));
        }
        $profModules = $professeur->modules()->pluck('modules.id')->toArray();
        return view('professeurs.edit')
                ->with('professeur', $professeur)
                ->with('profModules', $profModules)
                ->withModules(\App\Models\Module::all());
    }

    /**
     * Update the specified Professeur in storage.
     *
     * @param  int              $id
     * @param UpdateProfesseurRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfesseurRequest $request)
    {
        $professeur = $this->professeurRepository->find($id);

        if (empty($professeur)) {
            Flash::error('Professeur introuvable');

            return redirect(route('professeurs.index'));
        }
        $message = 'Professeur mis à jour avec succès.';

        $professeur = $this->professeurRepository->update($request->all(), $id);
        $professeur->modules()->sync($request->input('modules'));
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('professeurs.index'));
    }
    
    public function storeChoixProfesseur(Request $request) {
        $this->validate($request, [
           'id_choix_1' => 'required', 
           'id_choix_2' => 'required', 
           'id_choix_3' => 'required', 
        ]);
        $inputs = $request->all();
        $inputs['etudiant_id'] = Auth::id();
        ChoixEtudiant::where('etudiant_id', Auth::id())->delete();
        ChoixEtudiant::create($inputs);
        return HttpUtil::sendSuccessDialogResponse('Choix enregistré avec succès');
    }

    /**
     * Remove the specified Professeur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $professeur = $this->professeurRepository->find($id);

        if (empty($professeur)) {
            Flash::error('Professeur not found');

            return redirect(route('professeurs.index'));
        }

        $this->professeurRepository->delete($id);
        $message = 'Professeur supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('professeurs.index'));
    }
    
    public function choixProfesseur() {
        $professeurs = Professeur::where('role_id', 10)->get();
        return view('professeurs.choix')->withProfesseurs($professeurs);
    }
    
    public function listProfesseursDisponibles(\Illuminate\Http\Request $request) {
        $modules = \App\Models\Module::all();
        $filterModule = $request->input('module') ? $request->input('module') : $modules[0]->id;
        $professeurs = Professeur::with('modules')->whereHas('modules', function(Builder $query) use ($filterModule){
            $query->where('module_id', $filterModule);
        })->get();
        return view('professeurs.liste_disponibles', compact('filterModule', 'modules', 'professeurs'));
    }
}

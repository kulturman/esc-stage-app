<?php

namespace App\Http\Controllers;

use App\DataTables\DepotDataTable;
use App\Http\Requests\CreateDepotRequest;
use App\Http\Requests\UpdateDepotRequest;
use App\Repositories\DepotRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;
use App\Models\Stage;
use App\Util\Util;
use App\Notifications\DocumentUploaded;
use App\Models\Depot;
use App\Util\StateUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTables\SuggestionsDataTable;

class DepotController extends AppBaseController
{
    /** @var  DepotRepository */
    private $depotRepository;

    public function __construct(DepotRepository $depotRepo)
    {
        $this->depotRepository = $depotRepo;
        $this->middleware('auth');
        $this->middleware('prof')->only(['index', 'amendDepot', 'showAmendForm']);
    }

    /**
     * Display a listing of the Depot.
     *
     * @param DepotDataTable $depotDataTable
     * @return Response
     */
    public function index(DepotDataTable $depotDataTable)
    {
        return $depotDataTable->render('depots.index');
    }

    /**
     * Show the form for creating a new Depot.
     *
     * @return Response
     */
    public function create(Stage $stage)
    {
        return view('depots.create')->withStage($stage);
    }

    /**
     * Store a newly created Depot in storage.
     *
     * @param CreateDepotRequest $request
     *
     * @return Response
     */
    public function store(CreateDepotRequest $request)
    {
        $inputs = $request->all();
        $message = 'Depot enregistré avec succès.';
        $inputs['path'] = Util::uploadDocument($request->file('path'));
        $this->depotRepository->create($inputs);
        $stage = Stage::find($inputs['stage_id']);
        $stage->profDeSuivi->notify(
            new DocumentUploaded($stage->etudiant, \App\User::where('role_id', 11)->first())
        );
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('stages.my_stages'));
    }

    /**
     * Display the specified Depot.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $depot = $this->depotRepository->find($id);

        if (empty($depot)) {
            Flash::error('Depot introuvable');

            return redirect(route('depots.index'));
        }

        return view('depots.show')->with('depot', $depot);
    }

    /**
     * Show the form for editing the specified Depot.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $depot = $this->depotRepository->find($id);

        if (empty($depot)) {
            Flash::error('Depot introuvable');

            return redirect(route('depots.index'));
        }

        return view('depots.edit')->with('depot', $depot);
    }

    /**
     * Update the specified Depot in storage.
     *
     * @param  int              $id
     * @param UpdateDepotRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepotRequest $request)
    {
        $depot = $this->depotRepository->find($id);

        if (empty($depot)) {
            Flash::error('Depot introuvable');

            return redirect(route('depots.index'));
        }
        $message = 'Depot mis à jour avec succès.';

        $depot = $this->depotRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('depots.index'));
    }

    /**
     * Remove the specified Depot from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $depot = $this->depotRepository->find($id);

        if (empty($depot)) {
            Flash::error('Depot not found');

            return redirect(route('depots.index'));
        }

        $this->depotRepository->delete($id);
        $message = 'Depot supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('depots.index'));
    }
    
    public function validateDepot(Depot $depot) {
        $depot->validee = true;
        $depot->save();
        $stage = $depot->stage;
        if($stage->phase <= StateUtil::$FINAL_EDITION_PART) {
            $stage->phase = $stage->phase + 1;
        }
        $stage->save();
        return HttpUtil::sendSuccessDialogResponse('Document validé avec succès');
    }
    
    public function showAmendForm(Depot $depot) {
        return view('depots.amend')->withDepot($depot);
    }
    
    public function amendDepot(Request $request, Depot $depot) {
        $inputs = $request->all();
        $message = 'Suggestions enregistrées avec succès.';
        $depot->amendee = true;
        $depot->save();
        $inputs['stage_id'] = $depot->stage->id;
        $inputs['depot_etudiant'] = false;
        $inputs['path'] = Util::uploadDocument($request->file('path'));
        $this->depotRepository->create($inputs);
        $stage = Stage::find($depot->stage_id);
        $stage->etudiant->notify(
            new DocumentUploaded(
                $stage->profDeSuivi, \App\User::where('role_id', 11)->first(), false
            )
        );
        Flash::success($message);
        return redirect(route('depots.index'));
    }
    
    public function can() {
        $result = DB::table('depots')
            ->select(DB::raw('COUNT(*) AS result'))
            ->join('stages', 'stages.id', '=', 'depots.stage_id')
            ->where('amendee', false)
            ->where('validee', false)
            ->where('depot_etudiant', true)
            ->where('etudiant_id', Auth::id())
            ->first();
        return response()->json(['result' => $result->result == 0]) ;
        //SELECT * FROM `depots` d INNER JOIN stages s on s.id=d.stage_id where amendee=0 and validee=0 and depot_etudiant=1 and s.etudiant_id=1
    }
    
    public function viewSuggestions(SuggestionsDataTable $datatTbale) {
        return $datatTbale->render('depots.view_suggestions');
    }
}

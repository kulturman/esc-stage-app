<?php

namespace App\Http\Controllers;

use App\DataTables\SoutenanceDataTable;
use App\Http\Requests\CreateSoutenanceRequest;
use App\Http\Requests\UpdateSoutenanceRequest;
use App\Repositories\SoutenanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;
use App\Util\Util;

class SoutenanceController extends AppBaseController
{
    /** @var  SoutenanceRepository */
    private $soutenanceRepository;

    public function __construct(SoutenanceRepository $soutenanceRepo)
    {
        $this->soutenanceRepository = $soutenanceRepo;
        $this->middleware('auth');
        $this->middleware('admin')->except(['index']);
    }

    /**
     * Display a listing of the Soutenance.
     *
     * @param SoutenanceDataTable $soutenanceDataTable
     * @return Response
     */
    public function index(SoutenanceDataTable $soutenanceDataTable)
    {
        return $soutenanceDataTable->render('soutenances.index');
    }

    /**
     * Show the form for creating a new Soutenance.
     *
     * @return Response
     */
    public function create(\App\Repositories\UserRepository $userRepo)
    {
        $annees = \App\Models\Annee::all();
        $domaines = \App\Models\Module::all();
        $profs = $userRepo->getTeachers();
        return view('soutenances.create', compact('annees', 'domaines', 'profs'));
    }

    /**
     * Store a newly created Soutenance in storage.
     *
     * @param CreateSoutenanceRequest $request
     *
     * @return Response
     */
    public function store(CreateSoutenanceRequest $request)
    {
        $inputs = $request->all();
        $message = 'Soutenance enregistrée avec succès.';
        
        if(isset($inputs['rapport'])) {
            $inputs['rapport'] = Util::uploadDocument($request->file('rapport'));
        }

        $soutenance = $this->soutenanceRepository->create($inputs);
        $soutenance->users()->sync($inputs['users']);

        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('soutenances.index'));
    }

    /**
     * Display the specified Soutenance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $soutenance = $this->soutenanceRepository->find($id);

        if (empty($soutenance)) {
            Flash::error('Soutenance introuvable');

            return redirect(route('soutenances.index'));
        }

        return view('soutenances.show')->with('soutenance', $soutenance);
    }

    /**
     * Show the form for editing the specified Soutenance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $soutenance = $this->soutenanceRepository->find($id);

        if (empty($soutenance)) {
            Flash::error('Soutenance introuvable');

            return redirect(route('soutenances.index'));
        }

        return view('soutenances.edit')->with('soutenance', $soutenance);
    }

    /**
     * Update the specified Soutenance in storage.
     *
     * @param  int              $id
     * @param UpdateSoutenanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSoutenanceRequest $request)
    {
        $soutenance = $this->soutenanceRepository->find($id);

        if (empty($soutenance)) {
            Flash::error('Soutenance introuvable');

            return redirect(route('soutenances.index'));
        }
        $message = 'Soutenance mis à jour avec succès.';

        $soutenance = $this->soutenanceRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('soutenances.index'));
    }

    /**
     * Remove the specified Soutenance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $soutenance = $this->soutenanceRepository->find($id);

        if (empty($soutenance)) {
            Flash::error('Soutenance not found');

            return redirect(route('soutenances.index'));
        }

        $this->soutenanceRepository->delete($id);
        $message = 'Soutenance supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('soutenances.index'));
    }
}

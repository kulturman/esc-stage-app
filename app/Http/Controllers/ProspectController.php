<?php

namespace App\Http\Controllers;

use App\DataTables\ProspectDataTable;
use App\Http\Requests\CreateProspectRequest;
use App\Http\Requests\UpdateProspectRequest;
use App\Repositories\ProspectRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;

class ProspectController extends AppBaseController
{
    /** @var  ProspectRepository */
    private $prospectRepository;

    public function __construct(ProspectRepository $prospectRepo)
    {
        $this->prospectRepository = $prospectRepo;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Prospect.
     *
     * @param ProspectDataTable $prospectDataTable
     * @return Response
     */
    public function index(ProspectDataTable $prospectDataTable)
    {
        return $prospectDataTable->render('prospects.index');
    }

    /**
     * Show the form for creating a new Prospect.
     *
     * @return Response
     */
    public function create()
    {
        return view('prospects.create');
    }

    /**
     * Store a newly created Prospect in storage.
     *
     * @param CreateProspectRequest $request
     *
     * @return Response
     */
    public function store(CreateProspectRequest $request)
    {
        $inputs = $request->all();
        $message = 'Prospect enregistré avec succès.';

        $this->prospectRepository->create($inputs);

        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('prospects.index'));
    }

    /**
     * Display the specified Prospect.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prospect = $this->prospectRepository->find($id);

        if (empty($prospect)) {
            Flash::error('Prospect introuvable');

            return redirect(route('prospects.index'));
        }

        return view('prospects.show')->with('prospect', $prospect);
    }

    /**
     * Show the form for editing the specified Prospect.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prospect = $this->prospectRepository->find($id);

        if (empty($prospect)) {
            Flash::error('Prospect introuvable');

            return redirect(route('prospects.index'));
        }

        return view('prospects.edit')->with('prospect', $prospect);
    }

    /**
     * Update the specified Prospect in storage.
     *
     * @param  int              $id
     * @param UpdateProspectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProspectRequest $request)
    {
        $prospect = $this->prospectRepository->find($id);

        if (empty($prospect)) {
            Flash::error('Prospect introuvable');

            return redirect(route('prospects.index'));
        }
        $message = 'Prospect mis à jour avec succès.';

        $prospect = $this->prospectRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('prospects.index'));
    }

    /**
     * Remove the specified Prospect from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prospect = $this->prospectRepository->find($id);

        if (empty($prospect)) {
            Flash::error('Prospect not found');

            return redirect(route('prospects.index'));
        }

        $this->prospectRepository->delete($id);
        $message = 'Prospect supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('prospects.index'));
    }
}

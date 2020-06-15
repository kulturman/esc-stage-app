<?php

namespace App\Http\Controllers;

use App\DataTables\EntrepriseDataTable;
use App\Http\Requests\CreateEntrepriseRequest;
use App\Http\Requests\UpdateEntrepriseRequest;
use App\Repositories\EntrepriseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;

class EntrepriseController extends AppBaseController
{
    /** @var  EntrepriseRepository */
    private $entrepriseRepository;

    public function __construct(EntrepriseRepository $entrepriseRepo)
    {
        $this->entrepriseRepository = $entrepriseRepo;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Entreprise.
     *
     * @param EntrepriseDataTable $entrepriseDataTable
     * @return Response
     */
    public function index(EntrepriseDataTable $entrepriseDataTable)
    {
        return $entrepriseDataTable->render('entreprises.index');
    }

    /**
     * Show the form for creating a new Entreprise.
     *
     * @return Response
     */
    public function create()
    {
        return view('entreprises.create');
    }

    /**
     * Store a newly created Entreprise in storage.
     *
     * @param CreateEntrepriseRequest $request
     *
     * @return Response
     */
    public function store(CreateEntrepriseRequest $request)
    {
        $inputs = $request->all();
        $message = 'Entreprise enregistré avec succès.';

        $this->entrepriseRepository->create($inputs);

        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('entreprises.index'));
    }

    /**
     * Display the specified Entreprise.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error('Entreprise introuvable');

            return redirect(route('entreprises.index'));
        }

        return view('entreprises.show')->with('entreprise', $entreprise);
    }

    /**
     * Show the form for editing the specified Entreprise.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error('Entreprise introuvable');

            return redirect(route('entreprises.index'));
        }

        return view('entreprises.edit')->with('entreprise', $entreprise);
    }

    /**
     * Update the specified Entreprise in storage.
     *
     * @param  int              $id
     * @param UpdateEntrepriseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEntrepriseRequest $request)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error('Entreprise introuvable');

            return redirect(route('entreprises.index'));
        }
        $message = 'Entreprise mis à jour avec succès.';

        $entreprise = $this->entrepriseRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('entreprises.index'));
    }

    /**
     * Remove the specified Entreprise from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            Flash::error('Entreprise not found');

            return redirect(route('entreprises.index'));
        }

        $this->entrepriseRepository->delete($id);
        $message = 'Entreprise supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('entreprises.index'));
    }
}

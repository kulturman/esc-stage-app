<?php

namespace App\Http\Controllers;

use App\DataTables\AnneeDataTable;
use App\Http\Requests\CreateAnneeRequest;
use App\Http\Requests\UpdateAnneeRequest;
use App\Repositories\AnneeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;

class AnneeController extends AppBaseController
{
    /** @var  AnneeRepository */
    private $anneeRepository;

    public function __construct(AnneeRepository $anneeRepo)
    {
        $this->anneeRepository = $anneeRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Annee.
     *
     * @param AnneeDataTable $anneeDataTable
     * @return Response
     */
    public function index(AnneeDataTable $anneeDataTable)
    {
        return $anneeDataTable->render('annees.index');
    }

    /**
     * Show the form for creating a new Annee.
     *
     * @return Response
     */
    public function create()
    {
        return view('annees.create');
    }

    /**
     * Store a newly created Annee in storage.
     *
     * @param CreateAnneeRequest $request
     *
     * @return Response
     */
    public function store(CreateAnneeRequest $request)
    {
        $inputs = $request->all();
        $message = 'Annee enregistré avec succès.';

        $this->anneeRepository->create($inputs);

        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('annees.index'));
    }

    /**
     * Display the specified Annee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Annee introuvable');

            return redirect(route('annees.index'));
        }

        return view('annees.show')->with('annee', $annee);
    }

    /**
     * Show the form for editing the specified Annee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Annee introuvable');

            return redirect(route('annees.index'));
        }

        return view('annees.edit')->with('annee', $annee);
    }

    /**
     * Update the specified Annee in storage.
     *
     * @param  int              $id
     * @param UpdateAnneeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnneeRequest $request)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Annee introuvable');

            return redirect(route('annees.index'));
        }
        $message = 'Annee mis à jour avec succès.';

        $annee = $this->anneeRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('annees.index'));
    }

    /**
     * Remove the specified Annee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $annee = $this->anneeRepository->find($id);

        if (empty($annee)) {
            Flash::error('Annee not found');

            return redirect(route('annees.index'));
        }

        $this->anneeRepository->delete($id);
        $message = 'Annee supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('annees.index'));
    }
}

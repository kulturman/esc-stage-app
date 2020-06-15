<?php

namespace App\Http\Controllers;

use App\DataTables\FiliereDataTable;
use App\Http\Requests\CreateFiliereRequest;
use App\Http\Requests\UpdateFiliereRequest;
use App\Repositories\FiliereRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;

class FiliereController extends AppBaseController
{
    /** @var  FiliereRepository */
    private $filiereRepository;

    public function __construct(FiliereRepository $filiereRepo)
    {
        $this->filiereRepository = $filiereRepo;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Filiere.
     *
     * @param FiliereDataTable $filiereDataTable
     * @return Response
     */
    public function index(FiliereDataTable $filiereDataTable)
    {
        return $filiereDataTable->render('filieres.index');
    }

    /**
     * Show the form for creating a new Filiere.
     *
     * @return Response
     */
    public function create()
    {
        return view('filieres.create');
    }

    /**
     * Store a newly created Filiere in storage.
     *
     * @param CreateFiliereRequest $request
     *
     * @return Response
     */
    public function store(CreateFiliereRequest $request)
    {
        $inputs = $request->all();
        $message = 'Filiere enregistré avec succès.';

        $this->filiereRepository->create($inputs);

        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('filieres.index'));
    }

    /**
     * Display the specified Filiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere introuvable');

            return redirect(route('filieres.index'));
        }

        return view('filieres.show')->with('filiere', $filiere);
    }

    /**
     * Show the form for editing the specified Filiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere introuvable');

            return redirect(route('filieres.index'));
        }

        return view('filieres.edit')->with('filiere', $filiere);
    }

    /**
     * Update the specified Filiere in storage.
     *
     * @param  int              $id
     * @param UpdateFiliereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFiliereRequest $request)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere introuvable');

            return redirect(route('filieres.index'));
        }
        $message = 'Filiere mis à jour avec succès.';

        $filiere = $this->filiereRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('filieres.index'));
    }

    /**
     * Remove the specified Filiere from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $filiere = $this->filiereRepository->find($id);

        if (empty($filiere)) {
            Flash::error('Filiere not found');

            return redirect(route('filieres.index'));
        }

        $this->filiereRepository->delete($id);
        $message = 'Filiere supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('filieres.index'));
    }
}

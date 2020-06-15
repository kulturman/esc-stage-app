<?php

namespace App\Http\Controllers;

use App\DataTables\ModuleDataTable;
use App\Http\Requests\CreateModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Repositories\ModuleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;

class ModuleController extends AppBaseController
{
    /** @var  ModuleRepository */
    private $moduleRepository;

    public function __construct(ModuleRepository $moduleRepo)
    {
        $this->moduleRepository = $moduleRepo;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Module.
     *
     * @param ModuleDataTable $moduleDataTable
     * @return Response
     */
    public function index(ModuleDataTable $moduleDataTable)
    {
        return $moduleDataTable->render('modules.index');
    }

    /**
     * Show the form for creating a new Module.
     *
     * @return Response
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * Store a newly created Module in storage.
     *
     * @param CreateModuleRequest $request
     *
     * @return Response
     */
    public function store(CreateModuleRequest $request)
    {
        $inputs = $request->all();
        $message = 'Module enregistré avec succès.';

        $this->moduleRepository->create($inputs);

        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('modules.index'));
    }

    /**
     * Display the specified Module.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $module = $this->moduleRepository->find($id);

        if (empty($module)) {
            Flash::error('Module introuvable');

            return redirect(route('modules.index'));
        }

        return view('modules.show')->with('module', $module);
    }

    /**
     * Show the form for editing the specified Module.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $module = $this->moduleRepository->find($id);

        if (empty($module)) {
            Flash::error('Module introuvable');

            return redirect(route('modules.index'));
        }

        return view('modules.edit')->with('module', $module);
    }

    /**
     * Update the specified Module in storage.
     *
     * @param  int              $id
     * @param UpdateModuleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModuleRequest $request)
    {
        $module = $this->moduleRepository->find($id);

        if (empty($module)) {
            Flash::error('Module introuvable');

            return redirect(route('modules.index'));
        }
        $message = 'Module mis à jour avec succès.';

        $module = $this->moduleRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('modules.index'));
    }

    /**
     * Remove the specified Module from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $module = $this->moduleRepository->find($id);

        if (empty($module)) {
            Flash::error('Module not found');

            return redirect(route('modules.index'));
        }

        $this->moduleRepository->delete($id);
        $message = 'Module supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('modules.index'));
    }
}

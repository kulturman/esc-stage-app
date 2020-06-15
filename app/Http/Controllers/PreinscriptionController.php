<?php

namespace App\Http\Controllers;

use App\DataTables\PreinscriptionDataTable;
use App\Http\Requests\CreatePreinscriptionRequest;
use App\Http\Requests\UpdatePreinscriptionRequest;
use App\Repositories\PreinscriptionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyPreRegistered;

class PreinscriptionController extends AppBaseController
{
    /** @var  PreinscriptionRepository */
    private $preinscriptionRepository;

    public function __construct(PreinscriptionRepository $preinscriptionRepo)
    {
        $this->preinscriptionRepository = $preinscriptionRepo;
        $this->middleware('admin');
    }

    /**
     * Display a listing of the Preinscription.
     *
     * @param PreinscriptionDataTable $preinscriptionDataTable
     * @return Response
     */
    public function index(PreinscriptionDataTable $preinscriptionDataTable)
    {
        return $preinscriptionDataTable->render('preinscriptions.index');
    }

    /**
     * Show the form for creating a new Preinscription.
     *
     * @return Response
     */
    public function create()
    {
        return view('preinscriptions.create')->withDomaines(\App\Models\Module::all());
    }

    /**
     * Store a newly created Preinscription in storage.
     *
     * @param CreatePreinscriptionRequest $request
     *
     * @return Response
     */
    public function store(CreatePreinscriptionRequest $request)
    {
        $inputs = $request->all();
        $message = 'Preinscription enregistrée avec succès.';

        $this->preinscriptionRepository->create($inputs);

        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('preinscriptions.index'));
    }

    /**
     * Show the form for editing the specified Preinscription.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $preinscription = $this->preinscriptionRepository->find($id);

        if (empty($preinscription)) {
            Flash::error('Preinscription introuvable');

            return redirect(route('preinscriptions.index'));
        }

        return view('preinscriptions.edit')
                ->withDomaines(\App\Models\Module::all())
                ->with('preinscription', $preinscription);
    }

    /**
     * Update the specified Preinscription in storage.
     *
     * @param  int              $id
     * @param UpdatePreinscriptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreinscriptionRequest $request)
    {
        $preinscription = $this->preinscriptionRepository->find($id);

        if (empty($preinscription)) {
            Flash::error('Preinscription introuvable');

            return redirect(route('preinscriptions.index'));
        }
        $message = 'Preinscription mise à jour avec succès.';

        $preinscription = $this->preinscriptionRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('preinscriptions.index'));
    }

    /**
     * Remove the specified Preinscription from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $preinscription = $this->preinscriptionRepository->find($id);

        if (empty($preinscription)) {
            Flash::error('Preinscription not found');

            return redirect(route('preinscriptions.index'));
        }

        $this->preinscriptionRepository->delete($id);
        $message = 'Preinscription supprimée avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('preinscriptions.index'));
    }
    
    public function notify($preInscrit) {
        return $this->notifyUtil(\App\Models\Preinscription::find($preInscrit));
    }
    
    public function notifyAll() {
        return $this->notifyUtil();
    }
    
    private function notifyUtil($preInscrit) {
        Mail::to($preInscrit->email)->send(new NotifyPreRegistered($preInscrit));
        //return ()->render();
    }
}

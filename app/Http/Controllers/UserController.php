<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Util\HttpUtil;
use App\Models\Role;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('admin')->except(['showPasswordChangeForm', 'updatePassword']);
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        $title = 'Liste des administrateurs';
        return $userDataTable
                ->with('title' , $title)
                ->with('role' , 11)
                ->render('users.index' , compact("title"));
    }
    
    public function viewEtudiants(UserDataTable $userDataTable)
    {
        $title = 'Liste des étudiants';
        return $userDataTable
                ->with('role' , Role::where('label' , 'Etudiant')->first()->id)
                ->render('users.index' , compact("title"));
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $bcRoute = 'users.index';
        $bcLabel = 'Liste des utilisateurs';
        $label = 'Créer un utilisateur';
        return view('users.create' , compact('bcRoute' , 'bcLabel' , 'label'))
                ->withRoles(Role::all());
    }
    
    public function createEtudiant()
    {
        $bcRoute = 'etudiants.index';
        $bcLabel = 'Liste des étudiants';
        $label = 'Créer un étudiant';
        $preInscription = null;
        if(request('preinscription')) {
            $preInscription = \App\Models\Preinscription::find(request('preinscription'));
        }
        return view('users.create' , compact('bcRoute' , 'bcLabel' , 'label'))
                ->with('role' , Role::where('label' , 'Etudiant')->first()->id)
                ->withPreInscription($preInscription)
                ->withRoles(Role::all());
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request, \App\Repositories\PreinscriptionRepository
            $preinscriptionRepository)
    {
        $inputs = $request->all();
        
        $inputs['password'] = bcrypt('123456');
        $message = 'Enregistré avec succès.';

        $this->userRepository->create($inputs);
        if($inputs['preinscription']) {
            $preinscriptionRepository->delete($inputs['preinscription']);
        }

        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User introuvable');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User introuvable');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user)->withRoles(Role::all());
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Utilisateur introuvable');

            return redirect(route('users.index'));
        }
        $message = 'Utilisateur mis à jour avec succès.';

        $user = $this->userRepository->update($request->all(), $id);
        if($request->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message, false);
        }

        Flash::success($message);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Utilisateur not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);
        $message = 'Utilisateur supprimé avec succès.';
        if(request()->ajax()) {
            return HttpUtil::sendSuccessDialogResponse($message);
        }
        Flash::success($message);

        return redirect(route('users.index'));
    }
    
    public function showPasswordChangeForm() {
        return view('users.password');
    }
    
    public function updatePassword(\Illuminate\Http\Request $request) {
        $this->validate($request, [
            'password' => 'required|confirmed',
        ]);
        
        $user = auth()->user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return HttpUtil::sendSuccessDialogResponse("Mot de passe changé avec succès", true);
    }
}

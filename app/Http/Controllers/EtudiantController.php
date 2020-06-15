<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\ChoixEtudiant;
use App\DataTables\ChoixEtudiantsDataTable;
use App\Repositories\UserRepository;

class EtudiantController extends Controller
{
    public function mesChoix() {
        $choix = ChoixEtudiant
                    ::where('etudiant_id', Auth::id())
                    ->get();
        return view('etudiants.mes_choix')->withChoix($choix);
    }
    
    public function listChoixEtudiants(ChoixEtudiantsDataTable $dataTable) {
        return $dataTable->render('etudiants.liste_choix_etudiants');
    }
    
    public function getByName(UserRepository $repository) {
        $result = $repository->findStudentsByName(request('q'));
        return $result;
    }
}

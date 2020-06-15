<?php

namespace App\Http\Controllers;
use App\Repositories\StageRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StageRepository $repo)
    {
        $stagesNumber = $repo->getStagesNumber();
        $finalReportsAdmin = \App\Models\Depot::where('final',true)->where('validee', false)->count();
        $studentsChoices = \App\Models\ChoixEtudiant::all()->count();
        $freeProfesseurs = 0;
        $myStudents = \App\Models\Stage::where('prof_suivi_id', \Illuminate\Support\Facades\Auth::id())
                ->where('phase', '<' , \App\Util\StateUtil::$FINAL_EDITION_PART)->count();
        $depots = \App\Models\Depot::where('validee', false)
            ->join('stages', 'stages.id', 'depots.stage_id')
            ->where('amendee', false)
            ->where('depot_etudiant', true)
            ->where('stages.prof_suivi_id', \Illuminate\Support\Facades\Auth::id())->count();
        $finalReportsProf = \App\Models\Depot::where('validee', false)
            ->where('final',true)
            ->join('stages', 'stages.id', 'depots.stage_id')
            ->where('amendee', false)
            ->where('depot_etudiant', true)
            ->where('stages.prof_suivi_id', \Illuminate\Support\Facades\Auth::id())->count();
        $profsTab = [];
        foreach(\App\Models\Professeur::with('studentsInStageNumber')->get() as $prof) {
            if(count($prof->studentsInStageNumber) < 3 && !in_array($prof->id, $profsTab)) {
                $freeProfesseurs++;
            }
            $profsTab[] = $prof->id;
        }
        $view = view('home', compact(
                'finalReportsProf', 'finalReportsAdmin',
                'stagesNumber', 'studentsChoices', 'freeProfesseurs', 'myStudents', 'depots'));
        if(session('role') == 'etudiant') {
            $view->withStage($repo->getLastStage(\Illuminate\Support\Facades\Auth::id()));
        }
        return $view;
    }
}

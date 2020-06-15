<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Notifications\NotifyTeacherWhenNoReaction;

class UtilController extends Controller
{
    public function notifyTeachers() {
        $depots = DB::table('depots')
            ->where('amendee', false)
            ->where('validee', false)
            ->where('depot_etudiant', true)
            ->whereRaw("DATEDIFF(now(),created_at) >= 15")
            ->get();
        foreach($depots as $depot) {
            $depot = \App\Models\Depot::find($depot->id);
            $teacher = $depot->stage->profDeSuivi;
            $teacher->notify(new NotifyTeacherWhenNoReaction($depot));
        }
    }
}

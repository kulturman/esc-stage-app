<?php

namespace App\Repositories;

use App\Models\Stage;
use App\Repositories\BaseRepository;

/**
 * Class StageRepository
 * @package App\Repositories
 * @version April 12, 2020, 11:59 am UTC
*/

class StageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'etudiant_id',
        'prof_suivi_id',
        'annee_id',
        'filiere_id',
        'phase',
        'directeur_memoire_id',
        'maitre_de_stage',
        'niveau',
        'date_debut'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Stage::class;
    }
    
    public function getLastStage($studentId) {
        return $this
                ->model
                ->join('users', 'users.id', 'stages.etudiant_id')
                ->select('stages.*')
                ->where('users.id', $studentId)
                ->orderBy('stages.created_at', 'DESC')
                ->first();
    }
    
    public function getByPhase($phase) {
        return $this->model->where('phase', $phase)->count();
    }
    
    public function getStagesNumber() {
        return $this->model->where('phase', '<', \App\Util\StateUtil::$FINAL_PART)->count();
    }
}

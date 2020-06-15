<?php

namespace App\Repositories;

use App\Models\Professeur;
use App\Repositories\BaseRepository;

/**
 * Class ProfesseurRepository
 * @package App\Repositories
 * @version April 26, 2020, 11:19 am UTC
*/

class ProfesseurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'date_naissance',
        'lieu_naissance',
        'genre',
        'contact',
        'role_id',
        'matricule'
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
        return Professeur::class;
    }
}

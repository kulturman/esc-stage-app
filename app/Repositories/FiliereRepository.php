<?php

namespace App\Repositories;

use App\Models\Filiere;
use App\Repositories\BaseRepository;

/**
 * Class FiliereRepository
 * @package App\Repositories
 * @version April 11, 2020, 11:11 am UTC
*/

class FiliereRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom_filiere'
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
        return Filiere::class;
    }
}

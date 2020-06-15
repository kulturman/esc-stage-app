<?php

namespace App\Repositories;

use App\Models\Soutenance;
use App\Repositories\BaseRepository;

/**
 * Class SoutenanceRepository
 * @package App\Repositories
 * @version May 17, 2020, 11:06 am UTC
*/

class SoutenanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'theme',
        'user_id',
        'annee_id'
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
        return Soutenance::class;
    }
}

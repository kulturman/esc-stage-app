<?php

namespace App\Repositories;

use App\Models\Annee;
use App\Repositories\BaseRepository;

/**
 * Class AnneeRepository
 * @package App\Repositories
 * @version April 11, 2020, 11:12 am UTC
*/

class AnneeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'debut',
        'fin'
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
        return Annee::class;
    }
}

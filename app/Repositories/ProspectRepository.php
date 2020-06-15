<?php

namespace App\Repositories;

use App\Models\Prospect;
use App\Repositories\BaseRepository;

/**
 * Class ProspectRepository
 * @package App\Repositories
 * @version May 18, 2020, 11:23 am UTC
*/

class ProspectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'contact',
        'adresse'
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
        return Prospect::class;
    }
}

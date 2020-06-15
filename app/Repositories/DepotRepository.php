<?php

namespace App\Repositories;

use App\Models\Depot;
use App\Repositories\BaseRepository;

/**
 * Class DepotRepository
 * @package App\Repositories
 * @version April 14, 2020, 6:54 am UTC
*/

class DepotRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stage_id',
        'path'
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
        return Depot::class;
    }
}

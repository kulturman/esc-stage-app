<?php

namespace App\Repositories;

use App\Models\Module;
use App\Repositories\BaseRepository;

/**
 * Class ModuleRepository
 * @package App\Repositories
 * @version April 26, 2020, 10:54 am UTC
*/

class ModuleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle'
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
        return Module::class;
    }
}

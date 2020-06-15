<?php

namespace App\Repositories;

use App\Models\Preinscription;
use App\Repositories\BaseRepository;

/**
 * Class PreinscriptionRepository
 * @package App\Repositories
 * @version May 18, 2020, 11:22 am UTC
*/

class PreinscriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'contact',
        'email',
        'module_id'
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
        return Preinscription::class;
    }
}

<?php

namespace App\Repositories;

use App\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version April 11, 2020, 11:23 am UTC
*/

class UserRepository extends BaseRepository
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
        'role_id'
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
        return User::class;
    }
    
    public function getStudents() {
        return $this->model->where('role_id' , 8)->get();
    }
    
    public function getTeachers() {
        return $this->model->where('role_id' , 10)->get();
    }
    
    public function findStudentsByName($name) {
        return $this
                ->model->where('role_id', 8)
                ->select(['id', DB::raw("CONCAT(name, ' (Mle:', matricule, ')') as text")])
                ->where("name", "LIKE", "%$name%")
                ->get();
    }
}

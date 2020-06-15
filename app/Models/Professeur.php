<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Util\StateUtil;

/**
 * Class Professeur
 * @package App\Models
 * @version April 26, 2020, 11:19 am UTC
 *
 * @property string name
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 * @property string date_naissance
 * @property string lieu_naissance
 * @property string genre
 * @property string contact
 * @property integer role_id
 * @property string matricule
 */
class Professeur extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'date_naissance' => 'date',
        'lieu_naissance' => 'string',
        'genre' => 'string',
        'contact' => 'string',
        'role_id' => 'integer',
        'matricule' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'contact' => 'required',
        'genre' => 'required',
    ];

    public function modules() {
        return $this->belongsToMany(Module::class);
    }
    
    public function studentsInStageNumber() {
        return $this
                ->hasMany(Stage::class, 'prof_suivi_id')
                ->where('phase','<>', StateUtil::$FINAL_PART)
                ->where('phase','<>', StateUtil::$FINAL_EDITION_PART);
    }
    
}

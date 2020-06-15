<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Soutenance
 * @package App\Models
 * @version May 17, 2020, 11:06 am UTC
 *
 * @property string theme
 * @property string user_id
 * @property integer annee_id
 */
class Soutenance extends Model
{
    use SoftDeletes;

    public $table = 'soutenances';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'theme',
        'user_id',
        'annee_id',
        'rapport',
        'module_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'theme' => 'string',
        'user_id' => 'string',
        'annee_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'theme' => 'required',
        'user_id' => 'required',
        'annee_id' => 'required'
    ];

    public function user() {
        return $this->belongsTo(\App\User::class);
    }
    
    public function annee() {
        return $this->belongsTo(Annee::class);
    }
    
    public function module() {
        return $this->belongsTo(Module::class);
    }
    
    public function users() {
        return $this->belongsToMany(\App\User::class);
    }
}

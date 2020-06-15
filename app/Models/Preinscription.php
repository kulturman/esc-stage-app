<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Preinscription
 * @package App\Models
 * @version May 18, 2020, 11:22 am UTC
 *
 * @property string nom
 * @property string contact
 * @property string email
 * @property string module_id
 */
class Preinscription extends Model
{

    public $table = 'preinscriptions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'contact',
        'email',
        'module_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'contact' => 'string',
        'email' => 'string',
        'module_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'contact' => 'required',
        'email' => 'required',
        'module_id' => 'required'
    ];

    public function module() {
        return $this->belongsTo(Module::class);
    }
    
}

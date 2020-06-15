<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Filiere
 * @package App\Models
 * @version April 11, 2020, 11:11 am UTC
 *
 * @property string nom_filiere
 */
class Filiere extends Model
{
    use SoftDeletes;

    public $table = 'filieres';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom_filiere'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom_filiere' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom_filiere' => 'required'
    ];

    
}

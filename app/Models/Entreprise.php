<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Entreprise
 * @package App\Models
 * @version April 26, 2020, 10:56 am UTC
 *
 * @property string nom
 * @property string contact
 * @property string adresse
 */
class Entreprise extends Model
{
    use SoftDeletes;

    public $table = 'entreprises';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'contact',
        'adresse'
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
        'adresse' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'contact' => 'required',
        'adresse' => 'required'
    ];

    
}

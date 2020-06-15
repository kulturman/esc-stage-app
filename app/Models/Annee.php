<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Annee
 * @package App\Models
 * @version April 11, 2020, 11:12 am UTC
 *
 * @property integer debut
 * @property integer fin
 */
class Annee extends Model
{
    use SoftDeletes;

    public $table = 'annees';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'debut',
        'fin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'debut' => 'integer',
        'fin' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'debut' => 'required',
        'fin' => 'required'
    ];

    
}

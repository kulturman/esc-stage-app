<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Depot
 * @package App\Models
 * @version April 14, 2020, 6:54 am UTC
 *
 * @property integer stage_id
 * @property string path
 */
class Depot extends Model
{
    use SoftDeletes;

    public $table = 'depots';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'stage_id',
        'path',
        'depot_etudiant',
        'amendee',
        'commentaire',
        'final'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stage_id' => 'integer',
        'path' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'stage_id' => 'required',
        'path' => 'required'
    ];

    public function stage() {
        return $this->belongsTo(Stage::class);
    }
}

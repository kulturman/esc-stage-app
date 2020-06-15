<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Stage
 * @package App\Models
 * @version April 12, 2020, 11:59 am UTC
 *
 * @property integer etudiant_id
 * @property integer prof_suivi_id
 * @property integer annee_id
 * @property integer filiere_id
 * @property integer phase
 * @property integer directeur_memoire_id
 * @property string maitre_de_stage
 * @property string niveau
 * @property string date_debut
 */
class Stage extends Model
{
    use SoftDeletes;

    public $table = 'stages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'etudiant_id',
        'prof_suivi_id',
        'annee_id',
        'filiere_id',
        'phase',
        'entreprise_id',
        'maitre_de_stage',
        'niveau',
        'date_debut'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'etudiant_id' => 'integer',
        'prof_suivi_id' => 'integer',
        'annee_id' => 'integer',
        'filiere_id' => 'integer',
        'phase' => 'integer',
        'entreprise_id' => 'integer',
        'maitre_de_stage' => 'string',
        'niveau' => 'string',
        'date_debut' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'etudiant_id' => 'required',
        'prof_suivi_id' => 'required',
        'annee_id' => 'required',
        'filiere_id' => 'required',
        'entreprise_id' => 'required',
        'maitre_de_stage' => 'required',
        'niveau' => 'required',
        'date_debut' => 'required'
    ];

    public function profDeSuivi() {
        return $this->belongsTo(\App\User::class , 'prof_suivi_id');
    }
    
    public function entreprise() {
        return $this->belongsTo(Entreprise::class);
    }
    
    public function etudiant() {
        return $this->belongsTo(\App\User::class , 'etudiant_id');
    }
    
    public function annee() {
        return $this->belongsTo(Annee::class , 'annee_id');
    }
    
    public function filiere() {
        return $this->belongsTo(Filiere::class , 'filiere_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChoixEtudiant extends Model
{
    public $fillable = ['id_choix_1', 'id_choix_2', 'id_choix_3' , 'etudiant_id'];
    
    public function choix1() {
        return $this->belongsTo(\App\User::class, 'id_choix_1');
    }
    
    public function choix2() {
        return $this->belongsTo(\App\User::class, 'id_choix_2');
    }
    
    public function choix3() {
        return $this->belongsTo(\App\User::class, 'id_choix_3');
    }
    
    public function etudiant() {
        return $this->belongsTo(\App\User::class, 'etudiant_id');
    }
}

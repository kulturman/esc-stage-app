<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'email',
        'password',
        'date_naissance',
        'lieu_naissance',
        'genre',
        'contact',
        'role_id',
        'matricule'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public static $rules = [
        'name'                  => 'required',
        'email'                 => 'required|email|unique:users,email'
    ];
    
    public function role() {
        return $this->belongsTo(Models\Role::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    //Cuando se haya implementado la API de Google desaparecerá la password
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'birthdate',       
        'nickname',        
        'photo_profile'        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', 
        ];
    }
}
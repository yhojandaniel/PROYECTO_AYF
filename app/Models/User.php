<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // Datos a rellenar en la base de datos
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'password',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

     // DAtos ocultos por seguridad
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     // Campos que se expresan verbalmente para evitar que Laravel confunda los tipos de datos
    protected $casts = [
        'email_verified_at' => 'datetime', //Que las fechas sean tratadas como fechas
        'rol' => 'string',                 //Que el campo de rol sea tratado como string (ENUM en la base de datos)
    ];

    // Cifrado de contraseña con la libreria Bcrypt
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}

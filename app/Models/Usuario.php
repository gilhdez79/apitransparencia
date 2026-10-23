<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'Usuarios';

    protected $fillable = [
        'Usuario',
        'Nombre',
        'ApellidoP',
        'Amaterno',
        'Pasword',
        'CorreoElectronico',
    ];

    protected $hidden = [
        'Pasword',
        'Password',
    ];
}

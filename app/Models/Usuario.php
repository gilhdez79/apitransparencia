<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

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

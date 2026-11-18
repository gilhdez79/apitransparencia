<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    protected $table = 'elementos';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'NombreElemento',
        'nombre',
    ];
}

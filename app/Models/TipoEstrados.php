<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstrados extends Model
{
    protected $table = 'tipoestrados';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
    ];
}

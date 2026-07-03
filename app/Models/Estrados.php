<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estrados extends Model
{
    protected $table = 'estrados';

    protected $primaryKey = 'Id';

    protected $fillable = [
        'annio',
        'nombrearchivo',
        'idtipoestrado',
        'link',
        'idponencia',
        'fecha',
    ];
}

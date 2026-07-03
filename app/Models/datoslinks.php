<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datoslinks extends Model
{
    protected $table = 'datoslinks';

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
        'urlcarpeta',
        'link',
        'linkhtml',
        'idarticulofraccion',
        'fechacreacion',
        'pesokb',
        'nombrearchivo',
        'annio',
        'idtrimestre',
        'idarticulo',
        'idfraccion',
        'idinciso',
        'mostrarentransp',
        'clasificacion',
        'idponencia',
        'idtipoestrado',
        'idsubcategoriahijo',
        'idsubcategoria',
    ];
}

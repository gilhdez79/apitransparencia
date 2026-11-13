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
        'UrlCarpeta',
        'link',
        'Link',
        'linkhtml',
        'LinklHtml',
        'idarticulofraccion',
        'idArticuloFraccion',
        'fechacreacion',
        'FechaCreacion',
        'pesokb',
        'PesoKb',
        'nombrearchivo',
        'NombreArchivo',
        'annio',
        'Annio',
        'idtrimestre',
        'idTrimestre',
        'idarticulo',
        'idArticulo',
        'idfraccion',
        'IdFraccion',
        'idinciso',
        'IdinCiso',
        'mostrarentransp',
        'clasificacion',
        'Clasificacion',
        'idponencia',
        'idtipoestrado',
        'idsubcategoriahijo',
        'idsubcategoria',
    ];
}

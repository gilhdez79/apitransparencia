<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datoslinks extends Model
{
    public $timestamps = false;
    //
     protected $fillable = [
    'urlcarpeta',
	"link",
	"linkhtml",
	"idarticulofraccion",
	"fechacreacion",
	"pesokb",
	"nombrearchivo",
	"annio",
	"idtrimestre",
	"idarticulo",
	"idfraccion",
	"idinciso",
	"mostrarentransp"
    ];
   
}

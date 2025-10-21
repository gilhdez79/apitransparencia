<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estrados extends Model
{
    //
        protected $fillable = [
    'id',
	"annio",
	"idtipoestrado",
	"link",
	"idponencia",
	"fecha"
    ];
}

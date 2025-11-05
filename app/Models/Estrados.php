<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estrados extends Model
{
    //
        protected $fillable = [
    'id',
	"annio",
	"nombrearchivo",
	"idtipoestrado",
	"link",
	"idponencia",
	"fecha",
	"created_at",
	"updated_at"
    ];
}

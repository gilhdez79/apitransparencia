<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementoClase extends Model
{
    protected $table = 'elementosclase';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Clase',
        'clase',
    ];
}

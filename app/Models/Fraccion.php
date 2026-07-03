<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fraccion extends Model
{
    protected $table = 'fraccions';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Consecutivo',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponencias extends Model
{
    protected $table = 'ponencia';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
    ];
}

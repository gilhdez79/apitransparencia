<?php

namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use App\Models\Fraccion;
use Illuminate\Http\Request;

class FraccionController extends Controller
{
    //
    private $fraccion;
    public function __construct(Fraccion $fraccion){
        $this->fraccion = $fraccion;
    }

    public function index(){

        $fraccions = $this->fraccion->all();

        return response()->json($fraccions);
    }
}  

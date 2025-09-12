<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;
class ArticuloController extends Controller
{
    //
      private $articulo;
    public function __construct(Articulo $articulo){
        $this->articulo = $articulo;
    }

    public function index(){

        $articulos = $this->articulo->all();

        return response()->json($articulos);
    }
}

<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\datoslinks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DatosLinksController extends Controller
{
    //
      private $datoslinks;
    public function __construct(datoslinks $datoslinks){
        $this->datoslinks = $datoslinks;
    }
    public function Registrar(Request $request){
             

    try{
        $data = $request->all();
        $this->datoslinks->create($data);
            return response()->json([
            'message'=>  "Se ha guardado correctamente"
        ]);
    }catch(\Exception $e){
        return response()->json([
            'message'=> $e->getMessage()
        ]);
    }

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estrados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EstradosController extends Controller
{
    private $estrados;
    public function __construct(Estrados $estrados)
    {
        $this->estrados = $estrados;
    }
    public function RegistrarEstrado(Request $request)
    {
        try {
            $data = $request->all();
            $this->estrados->create($data);
            return response()->json([
                'message' => "Se ha guardado correctamente"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
    public function GetEstrados()
    {
        $consultas = DB::select("
            SELECT E.*, T.Nombre as Estrado, P.Nombre AS ponencia FROM estrados E
	        LEFT JOIN tipoestrados T on E.IdTipoestrado = T.Id
	        LEFT JOIN ponencia P on P.Id  = E.IdPonencia
            ");
        return response()->json($consultas);
    }
}

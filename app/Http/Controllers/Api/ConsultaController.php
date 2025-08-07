<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    //
        private $consulta;
    public function __construct(Consulta $consulta){
        $this->$consulta = $consulta;
    }

    public function index(){

$statement = DB::statement("SET @annio=2024");
$statement2 = DB::statement("SET @idarticulo=76");
$statement3 = DB::statement("SET @IdFraccion=40");
$statement4 = DB::statement("SET @idTrimestre=1");

$consultas = DB::select("
select d.ID,d.Link , d.NombreArchivo,d.Annio, d.idArticulo, f.Nombre, t.NombreCorto  
from datoslinks d 
	join fraccions f on f.Id = d.IdFraccion
	join trimestre t on t.Id = d.idTrimestre 
	where (@annio=0 OR d.Annio = @annio) and
		  (@idarticulo=0 or d.idArticulo = 76) and 
	 	  (@IdFraccion=0 or IdFraccion = 40) and 
	 	  (@idTrimestre=0 or d.idTrimestre = 1)
");


        // $consultas =  DB::table('datoslinks')
        // ->join('fraccions', 'datoslinks.IdFraccion', "=", 'fraccions.id')
        // ->join('trimestre', 'datoslinks.idTrimestre', "=", 'trimestre.id')
        // ->where('datoslinks.Annio',2024)
        // ->where('datoslinks.idArticulo',76)
        // ->where('datoslinks.IdFraccion',40)
        // ->where('datoslinks.idTrimestre',1)
        // ->select('datoslinks.ID','datoslinks.Link','datoslinks.NombreArchivo','datoslinks.Annio', 'datoslinks.idArticulo','fraccions.Nombre', 'trimestre.NombreCorto')
        // ->get();

        return response()->json($consultas);




        //return response()->json($fraccions);
    }
}

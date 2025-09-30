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
    public function __construct(Consulta $consulta)
    {
        $this->$consulta = $consulta;
    }
    public function index()
    {

    }
    public function GetHipervinculos(\Illuminate\Http\Request $request)
    {

        //Get all JSON data as an Asspociative array
        $data = $request->json();
        $annio = $data->get('annio');
        $idarticulo = $data->get('idarticulo');
        $idfraccion = $data->get('idfraccion');
        $idtrimestre = $data->get('idtrimestre');

        //dd($data);

        $statement = DB::statement("SET @annio='$annio'");
        $statement2 = DB::statement("SET @idarticulo='$idarticulo'");
        $statement3 = DB::statement("SET @IdFraccion='$idfraccion'");
        $statement4 = DB::statement("SET @idTrimestre='$idtrimestre'");

        $consultas = DB::select("
select d.ID,d.Link , d.NombreArchivo,d.Annio, d.idArticulo, f.Nombre as Fraccion, t.NombreCorto, t.Id  As Trimestre,f.Consecutivo
from datoslinks d 
	join fraccions f on f.Id = d.IdFraccion
	join trimestre t on t.Id = d.idTrimestre 
	where (@annio=0 OR d.Annio = @annio) and
		  (@idarticulo=0 or d.idArticulo = @idarticulo) and 
	 	  (@IdFraccion=0 or IdFraccion = @IdFraccion) and 
	 	  (@idTrimestre=0 or d.idTrimestre = @idTrimestre)
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

    }

    public function GetLeyes()
    {
        $consultas = DB::select("
select d.ID,d.Link , d.NombreArchivo Documento, d.Annio 
from datoslinks d 
	where Clasificacion = 8
");
        return response()->json($consultas);
    }

}

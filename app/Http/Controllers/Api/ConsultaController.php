<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    private Consulta $consulta;

    public function __construct(Consulta $consulta)
    {
        $this->consulta = $consulta;
    }

    public function index() {}

    public function GetHipervinculos(Request $request)
    {
        $annio = $request->integer('annio');
        $idarticulo = $request->integer('idarticulo');
        $idfraccion = $request->integer('idfraccion');
        $idtrimestre = $request->integer('idtrimestre');

        $consultas = DB::select('
            SELECT
                d.ID,
                d.Link,
                d.NombreArchivo,
                d.Annio,
                d.idArticulo,
                f.Nombre AS Fraccion,
                t.NombreCorto,
                t.Id AS Trimestre,
                f.Consecutivo
            FROM datoslinks d
            JOIN fraccions f ON f.Id = d.IdFraccion
            JOIN trimestre t ON t.Id = d.idTrimestre
            WHERE (? = 0 OR d.Annio = ?)
                AND (? = 0 OR d.idArticulo = ?)
                AND (? = 0 OR d.IdFraccion = ?)
                AND (? = 0 OR d.idTrimestre = ?)
        ', [
            $annio,
            $annio,
            $idarticulo,
            $idarticulo,
            $idfraccion,
            $idfraccion,
            $idtrimestre,
            $idtrimestre,
        ]);

        return response()->json($consultas);
    }

    public function GetLeyes()
    {
        $consultas = DB::select('
            SELECT d.ID, d.Link, d.NombreArchivo AS Documento, d.Annio
            FROM datoslinks d
            WHERE d.Clasificacion = ?
        ', [1]);

        return response()->json($consultas);
    }
}

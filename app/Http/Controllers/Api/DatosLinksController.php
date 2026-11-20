<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\datoslinks;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DatosLinksController extends Controller
{
    private datoslinks $datoslinks;

    public function __construct(datoslinks $datoslinks)
    {
        $this->datoslinks = $datoslinks;
    }

    public function Registrar(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'link' => ['nullable', 'string', 'max:600', 'required_without:Link'],
            'Link' => ['nullable', 'string', 'max:600', 'required_without:link'],
            'nombrearchivo' => ['nullable', 'string', 'max:255'],
            'NombreArchivo' => ['nullable', 'string', 'max:255'],
            'annio' => ['nullable', 'integer'],
            'Annio' => ['nullable', 'integer'],
            'idtrimestre' => ['nullable', 'integer'],
            'idTrimestre' => ['nullable', 'integer'],
            'idarticulo' => ['nullable', 'integer'],
            'idArticulo' => ['nullable', 'integer'],
            'idfraccion' => ['nullable', 'integer'],
            'IdFraccion' => ['nullable', 'integer'],
            'clasificacion' => ['nullable', 'integer'],
            'Clasificacion' => ['nullable', 'integer'],
            'urlcarpeta' => ['nullable', 'string', 'max:500'],
            'UrlCarpeta' => ['nullable', 'string', 'max:500'],
            'linkhtml' => ['nullable', 'string'],
            'LinkHtml' => ['nullable', 'string'],
            'linkHtml' => ['nullable', 'string'],
            'LinklHtml' => ['nullable', 'string'],
            'idarticulofraccion' => ['nullable', 'integer'],
            'idArticuloFraccion' => ['nullable', 'integer'],
            'fechacreacion' => ['nullable', 'string', 'max:50'],
            'FechaCreacion' => ['nullable', 'string', 'max:50'],
            'pesokb' => ['nullable', 'string', 'max:255'],
            'PesoKb' => ['nullable', 'string', 'max:255'],
            'idinciso' => ['nullable', 'string', 'max:10'],
            'IdinCiso' => ['nullable', 'string', 'max:10'],
            'mostrarentransp' => ['nullable'],
            'idponencia' => ['nullable', 'integer'],
            'idtipoestrado' => ['nullable', 'integer'],
            'idsubcategoriahijo' => ['nullable', 'integer'],
            'idsubcategoria' => ['nullable', 'integer'],
        ]);

        // Normalización canónica para evitar columnas duplicadas o errores 1054/1110 en MySQL
        $canonical = [
            'Link' => $request->input('Link', $request->input('link')),
            'NombreArchivo' => $request->input('NombreArchivo', $request->input('nombrearchivo')),
            'Annio' => $request->input('Annio', $request->input('annio')),
            'idTrimestre' => $request->input('idTrimestre', $request->input('idtrimestre')),
            'idArticulo' => $request->input('idArticulo', $request->input('idarticulo')),
            'IdFraccion' => $request->input('IdFraccion', $request->input('idfraccion')),
            'Clasificacion' => $request->input('Clasificacion', $request->input('clasificacion')),
            'UrlCarpeta' => $request->input('UrlCarpeta', $request->input('urlcarpeta')),
            'LinklHtml' => $request->input('LinklHtml', $request->input('linkhtml', $request->input('LinkHtml', $request->input('linkHtml')))),
            'idArticuloFraccion' => $request->input('idArticuloFraccion', $request->input('idarticulofraccion', 0)),
            'FechaCreacion' => $request->input('FechaCreacion', $request->input('fechacreacion')),
            'PesoKb' => $request->input('PesoKb', $request->input('pesokb')),
            'IdinCiso' => $request->input('IdinCiso', $request->input('idinciso', $request->input('IdInciso', $request->input('idInciso', '0')))),
            'mostrarentransp' => $request->input('mostrarentransp', 1),
            'idponencia' => $request->input('idponencia', $request->input('IdPonencia')),
            'idtipoestrado' => $request->input('idtipoestrado', $request->input('IdTipoEstrado')),
            'idsubcategoriahijo' => $request->input('idsubcategoriahijo', $request->input('IdSubcategoriaHijo')),
            'idsubcategoria' => $request->input('idsubcategoria', $request->input('IdSubcategoria')),
        ];

        // Conservar campos con valor definido para respetar valores por defecto de la base de datos
        $datosAGuardar = array_filter($canonical, function ($value, $key) {
            if ($key === 'Link') {
                return true;
            }
            return $value !== null;
        }, ARRAY_FILTER_USE_BOTH);

        try {
            $created = $this->datoslinks->create($datosAGuardar);

            return response()->json([
                'success' => true,
                'message' => 'Se ha guardado correctamente',
                'id' => $created->getKey(),
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error al guardar en datoslinks: ' . $e->getMessage(), [
                'exception' => $e,
                'payload' => $request->all(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el registro',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }
}

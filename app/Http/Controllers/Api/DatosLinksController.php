<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\datoslinks;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DatosLinksController extends Controller
{
    private $datoslinks;

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

        try {
            $created = $this->datoslinks->create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Se ha guardado correctamente',
                'id' => $created->getKey(),
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el registro',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estrados;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstradosController extends Controller
{
    private $estrados;

    public function __construct(Estrados $estrados)
    {
        $this->estrados = $estrados;
    }

    public function RegistrarEstrado(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'idtipoestrado' => ['nullable', 'integer', 'required_without:IdTipoEstrado'],
            'IdTipoEstrado' => ['nullable', 'integer', 'required_without:idtipoestrado'],
            'idponencia' => ['nullable', 'integer', 'required_without:IdPonencia'],
            'IdPonencia' => ['nullable', 'integer', 'required_without:idponencia'],
            'fecha' => ['nullable', 'string', 'required_without:Fecha'],
            'Fecha' => ['nullable', 'string', 'required_without:fecha'],
            'nombrearchivo' => ['nullable', 'string', 'max:255', 'required_without:NombreArchivo'],
            'NombreArchivo' => ['nullable', 'string', 'max:255', 'required_without:nombrearchivo'],
            'annio' => ['nullable', 'integer'],
            'Annio' => ['nullable', 'integer'],
            'link' => ['nullable', 'string', 'max:255'],
            'Link' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            $created = $this->estrados->create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Se ha guardado correctamente',
                'id' => $created->getKey(),
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el estrado',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }

    public function GetEstrados(): JsonResponse
    {
        $consultas = DB::select("
            SELECT E.*, T.Nombre as Estrado, P.Nombre AS ponencia FROM estrados E
            LEFT JOIN tipoestrados T on E.IdTipoestrado = T.Id
            LEFT JOIN ponencia P on P.Id  = E.IdPonencia
        ");

        return response()->json($consultas);
    }
}

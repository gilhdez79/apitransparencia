<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Elemento;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ElementoController extends Controller
{
    private Elemento $elemento;

    public function __construct(Elemento $elemento)
    {
        $this->elemento = $elemento;
    }

    public function index(): JsonResponse
    {
        $elementos = $this->elemento->all();

        return response()->json($elementos);
    }

    public function store(Request $request): JsonResponse
    {
        // Soporte para ambos nombres de parámetro ('NombreElemento' o 'nombre')
        if (! $request->has('NombreElemento') && $request->has('nombre')) {
            $request->merge(['NombreElemento' => $request->input('nombre')]);
        }

        $validated = $request->validate([
            'NombreElemento' => [
                'required',
                'string',
                'max:100',
                'unique:elementos,NombreElemento',
            ],
        ]);

        try {
            $nuevoElemento = $this->elemento->create([
                'NombreElemento' => trim($validated['NombreElemento']),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Elemento creado correctamente',
                'elemento' => [
                    'Id' => $nuevoElemento->getKey(),
                    'NombreElemento' => $nuevoElemento->NombreElemento,
                ],
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el elemento',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        }
    }
}

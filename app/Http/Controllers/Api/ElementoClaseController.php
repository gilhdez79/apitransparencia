<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ElementoClase;
use Illuminate\Http\JsonResponse;

class ElementoClaseController extends Controller
{
    private ElementoClase $elementoClase;

    public function __construct(ElementoClase $elementoClase)
    {
        $this->elementoClase = $elementoClase;
    }

    public function index(): JsonResponse
    {
        $clases = $this->elementoClase->all();

        return response()->json($clases);
    }
}

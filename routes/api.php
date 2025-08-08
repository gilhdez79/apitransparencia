<?php

use App\Http\Controllers\Api\ConsultaController;
use App\Http\Controllers\Api\FraccionController;
use App\Http\Controllers\Api\ArticuloController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
use App\Models\Articulo;
use App\Models\Consulta;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function(){ 
$response  = new \Illuminate\Http\Response(json_encode(['msg'=> 'Mi primer Respuesta de API']));
$response->header('Content-Type', 'application/json');

    return $response ;
});

Route::namespace('Api\Controllers')->group(function(){
Route::get('/fracciones', [FraccionController::class, "index"]);
Route::get('/articulos', [ArticuloController::class, "index"]);
Route::get('/consulta', [ConsultaController::class, "index"]);
Route::post('/getconsulta', [ConsultaController::class, "GetHipervinculos"]);

});
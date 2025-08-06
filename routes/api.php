<?php

use App\Http\Controllers\Api\FraccionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

});
<?php

use App\Http\Controllers\gestionEmprunts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource("/loans", gestionEmprunts::class);

Route::patch('/loans/{id}/return', 'App\Http\Controllers\gestionEmprunts@patchEement');

Route::post('/updateValide/{id}', [gestionEmprunts::class, 'updateValide']);
<?php

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

use Illuminate\Foundation\Inspiring;
Route::get('/inspire', function () {
    return [
        'date'=>date('Y-m-d H:i:s'),
        'quote'=>Inspiring::quotes()->random()
    ];
});

use App\Http\Controllers\API\RegisterController;
Route::controller(RegisterController::class)
->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});        


use App\Http\Controllers\Api\MarcaController;
Route::middleware('auth:sanctum')->group( function () {
    Route::resources([
        'marcas' => MarcaController::class,
    ]);
});


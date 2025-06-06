<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KeynuaController;
Route::middleware('auth')->group(function () {
    Route::post('/crear-contrato-keynua', [KeynuaController::class, 'crearContrato']);
});


<?php

use App\Http\Controllers\Api\ConsultasRucController;
use App\Http\Controllers\Api\IdentificacionController;
use App\Http\Controllers\Api\KeynuaController;
use App\Http\Controllers\Api\KeynuaSignatureController;
use App\Http\Controllers\Web\BuscarOportunidadesWebControler;
use App\Http\Controllers\Web\ClientesWebController;
use App\Http\Controllers\Web\NosotrosWebController;
use App\Http\Controllers\Web\SubastaOnlineWebControler;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
#Landing page
Route::get('/Nosotros', [NosotrosWebController::class, 'index'])->name('index.view');
Route::get('/registro/clientes', [ClientesWebController::class, 'index'])->name('index.view');

Route::get('/blog', [NosotrosWebController::class, 'blog'])->name('blog.view');
Route::get('/contactanos', [NosotrosWebController::class, 'contactanos'])->name('contactanos.view');
Route::get('/productos', [NosotrosWebController::class, 'productos'])->name('productos.view');

#Panel de administración
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        return Inertia::render('Dashboard', [
            'mustReset' => $user->restablecimiento == 0,
        ]);
    })->name('dashboard');
    Route::get('/consultar-ruc/{ruc?}', [ConsultasRucController::class, 'consultar']);
    Route::get('/Buscar/Oportunidades', [BuscarOportunidadesWebControler::class, 'index'])->name('index.view');
    Route::get('/Subasta/Online', [SubastaOnlineWebControler::class, 'index'])->name('index.view');

    Route::get('/identificaciones', [IdentificacionController::class, 'index'])->name('identificaciones.index');
    Route::post('/identificaciones/crear', [IdentificacionController::class, 'crear'])->name('identificaciones.crear');
}); 

// Archivos de configuración adicionales
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class IdentificacionController extends Controller{
     private $keynuaDomain = 'https://localhost:443';

    public function index()
    {
        $identificaciones = $this->obtenerIdentificaciones();
        
        return Inertia::render('Identificaciones/Index', [
            'identificaciones' => $identificaciones,
            'defaultUser' => [
                'nombre' => 'Jett Teixeira',
                'email' => 'jett+ejemplo@keynua.com',
                'documento' => '75132806'
            ]
        ]);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'nombreUsuario' => 'required|string|max:255',
            'correoUsuario' => 'required|email|max:255',
            'documentoUsuario' => 'required|string|max:50',
        ]);

        try {
            $response = Http::post($this->keynuaDomain . '/crear-identificacion', [
                'titulo' => $request->titulo,
                'nombreUsuario' => $request->nombreUsuario,
                'correoUsuario' => $request->correoUsuario,
                'documentoUsuario' => $request->documentoUsuario,
            ]);

            if (!$response->successful()) {
                throw new \Exception('Error al crear la identificación');
            }

            // Obtener identificaciones actualizadas
            $identificaciones = $this->obtenerIdentificaciones();

            return redirect()->back()->with([
                'identificaciones' => $identificaciones,
                'success' => 'Identificación creada exitosamente'
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'general' => $e->getMessage()
            ]);
        }
    }

    private function obtenerIdentificaciones()
    {
        try {
            $response = Http::post($this->keynuaDomain . '/obtener-identificaciones');
            
            if ($response->successful()) {
                return $response->json();
            }
            
            return [];
        } catch (\Exception $e) {
            return [];
        }
    }
}
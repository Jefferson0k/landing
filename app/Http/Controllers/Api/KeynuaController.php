<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KeynuaController extends Controller
{
    private $apiUrl = 'https://api.stg.keynua.com';
    private $usuario;
    private $clave;

    public function __construct()
    {
        $this->usuario = env('KEYNUA_USER');
        $this->clave = env('KEYNUA_PASS');
    }

    public function crearContrato(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        // 1. Crear contrato
        $contratoPayload = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Descomenta esto si usas una plantilla:
            // 'templateId' => 'TU_TEMPLATE_ID',
        ];

        try {
            $response = Http::withBasicAuth($this->usuario, $this->clave)
                ->post("{$this->apiUrl}/slate/v1/contracts", $contratoPayload);

            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'error' => 'No se pudo generar el contrato.',
                    'debug' => $response->json(),
                ], $response->status());
            }

            $contractId = $response->json('contractId');

            // 2. Crear sesión para el contrato
            $sessionPayload = [
                'contractId' => $contractId,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ];

            $sessionResponse = Http::withBasicAuth($this->usuario, $this->clave)
                ->post("{$this->apiUrl}/slate/v1/session", $sessionPayload);

            if (!$sessionResponse->successful()) {
                return response()->json([
                    'success' => false,
                    'error' => 'No se pudo generar la sesión.',
                    'debug' => $sessionResponse->json(),
                ], $sessionResponse->status());
            }

            return response()->json([
                'success' => true,
                'token' => $sessionResponse->json('token')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Excepción al conectar con Keynua.',
                'debug' => $e->getMessage()
            ], 500);
        }
    }
}

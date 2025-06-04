<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KeynuaSession;
use App\Services\KeynuaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KeynuaController extends Controller
{
    public function createContract(Request $request, KeynuaService $keynua)
    {
        // Validación mínima
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        try {
            $data = [
                'name' => $request->input('contract_name', 'Contrato de prueba'),
                'type' => 'SIGNATURE',
                'users' => [
                    [
                        'email' => $request->input('email'),
                        'name' => $request->input('name'),
                        'documentType' => $request->input('document_type', 'DNI'),
                        'documentNumber' => $request->input('document_number', '12345678'),
                        'phoneNumber' => $request->input('phone_number', '+51999999999')
                    ]
                ],
                'files' => [
                    [
                        'name' => 'contrato_123.pdf',
                        'url' => $request->input('file_url', 'https://www.pj.gov.py/ebook/monografias/nacional/civil/Juan-Carlos-Corina-Los-Contratos-Simulados.pdf')
                    ]
                ]
            ];

            // Log para debugging
            Log::info('Keynua Contract Data:', $data);

            $response = $keynua->createContract($data);

            if (isset($response['token'])) {
                // Guardar sesión en base de datos (opcional)
                try {
                    KeynuaSession::create([
                        'token' => $response['token'],
                        'status' => 'pending',
                        'user_email' => $request->input('email'),
                        'contract_name' => $data['name'],
                        'created_at' => now()
                    ]);
                } catch (\Exception $e) {
                    // Si falla el guardado en BD, continúa igual
                    Log::warning('No se pudo guardar la sesión en BD:', ['error' => $e->getMessage()]);
                }

                return response()->json([
                    'success' => true,
                    'token' => $response['token'],
                    'message' => 'Contrato creado exitosamente'
                ]);
            }

            return response()->json([
                'success' => false,
                'error' => 'No se pudo generar el contrato.',
                'debug' => $response
            ], 400);

        } catch (\Exception $e) {
            Log::error('Error creating Keynua contract:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'error' => 'Error interno del servidor.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function updateResult(Request $request, $token)
    {
        try {
            $session = KeynuaSession::where('token', $token)->firstOrFail();
            
            $session->update([
                'status' => 'completed',
                'result' => $request->all(),
                'completed_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Resultado actualizado exitosamente'
            ]);

        } catch (\Exception $e) {
            Log::error('Error updating Keynua result:', [
                'token' => $token,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'error' => 'No se pudo actualizar el resultado.'
            ], 404);
        }
    }
}
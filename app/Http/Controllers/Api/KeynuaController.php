<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KeynuaSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KeynuaController extends Controller
{
    public function createContract(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email',
            'document_path' => 'required|string', // Ruta relativa dentro de storage/app
            'template_id' => 'required|string',
            'group_name' => 'required|string',
        ]);

        $apiKey = env('KEYNUA_API_KEY');
        $apiSecret = env('KEYNUA_API_SECRET');

        // Leer y codificar documento
        $filePath = storage_path('app/' . $request->document_path);
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }

        $base64Document = base64_encode(file_get_contents($filePath));

        // Armar el payload
        $payload = [
            'title' => 'Contrato generado desde Laravel',
            'description' => 'Prueba de integración',
            'reference' => 'ContratoRef-' . uniqid(),
            'documents' => [
                [
                    'name' => basename($filePath),
                    'base64' => $base64Document,
                ]
            ],
            'templateId' => $request->template_id,
            'expirationInHours' => 0,
            'users' => [
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'groups' => [
                        $request->group_name,
                    ],
                ]
            ],
            'flags' => [
                'chosenNotificationOptions' => ['email'],
            ]
        ];

        Log::info('🔹 Enviando solicitud a Keynua Contracts:', $payload);

        $response = Http::withBasicAuth($apiKey, $apiSecret)
            ->post('https://api.stg.keynua.com/slate/v1/contracts', $payload);

        Log::info('🔹 Respuesta de Keynua Contracts:', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if ($response->successful()) {
            $data = $response->json();

            KeynuaSession::create([
                'user_id' => $request->user_id,
                'token' => $data['token'],
                'document_name' => basename($filePath),
                'document_url' => null,
            ]);

            return response()->json([
                'message' => 'Contrato creado exitosamente',
                'token' => $data['token'],
                'url' => $data['url'] ?? null,
            ]);
        }

        return response()->json([
            'error' => 'Error creando contrato Keynua',
            'details' => $response->json()
        ], 500);
    }

    public function updateResult(Request $request, $token)
    {
        $session = KeynuaSession::where('token', $token)->firstOrFail();
        $session->update([
            'status' => 'completed',
            'result' => $request->all(),
        ]);

        return response()->json(['message' => 'Resultado actualizado']);
    }
}
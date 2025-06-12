<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\KeynuaSignature;

class KeynuaSignatureController extends Controller{
    public function iniciarFirma()
    {
        $apiKey = env('API_KEY');
        $authToken = env('AUTH_TOKEN');
        $baseUrl = env('KEYNUA_API_URL', 'https://api.stg.keynua.com');

        $response = Http::withHeaders([
            'x-api-key' => $apiKey,
            'Authorization' => "Bearer $authToken",
            'Content-Type' => 'application/json',
        ])->post("$baseUrl/v1/video-firma/flows", [
            'user' => [
                'documentType' => 'DNI',
                'documentNumber' => '12345678',
                'name' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'phone' => '999999999',
            ],
            'reason' => 'Firma de contrato de prueba',
            'returnUrl' => route('firma.finalizada'),
            'documents' => [
                [
                    'fileName' => 'contrato.pdf',
                    'fileUrl' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
                ],
            ],
        ]);

        if ($response->failed()) {
            return response()->json([
                'error' => 'Error al iniciar la firma',
                'status' => $response->status(),
                'body' => $response->body(),
            ], $response->status());
        }

        return response()->json($response->json());
    }

    public function firmaFinalizada()
    {
        return "Firma completada con éxito.";
    }

}

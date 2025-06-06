<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class ConsultasRucController extends Controller
{
    public function consultar($ruc = null)
    {
        if (empty($ruc)) {
            return response()->json(['error' => 'Debe proporcionar un RUC válido'], 400);
        }

        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFzcmFtaXJleEBnbWFpbC5jb20ifQ.cCgl4AZVFZ5KU0NDEyB83A5JXHlU4OgcfzKefO-oYTs';

        try {
            $response = Http::withToken($token)
                ->withHeaders([
                    'Referer' => 'http://apis.net.pe/api-ruc',
                ])
                ->get("https://dniruc.apisperu.com/api/v1/ruc/{$ruc}");

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json(['error' => 'No se encontraron datos para el RUC proporcionado'], 404);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al consultar el RUC', 'message' => $e->getMessage()], 500);
        }
    }
}

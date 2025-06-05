<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KeynuaService
{
    private $apiKey;
    private $apiSecret;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.keynua.api_key');
        $this->apiSecret = config('services.keynua.api_secret');
        $this->baseUrl = config('services.keynua.base_url', 'https://api.stg.keynua.com');
    }

    public function createContract($data)
    {
        try {
            if (!$this->apiKey || !$this->apiSecret) {
                Log::error('Keynua credentials not configured');
                return ['error' => 'Credenciales de Keynua no configuradas'];
            }

            $url = $this->baseUrl . '/slate/v1/contracts';

            Log::info('Keynua API Request:', [
                'url' => $url,
                'data' => $data,
            ]);

            $response = Http::withBasicAuth($this->apiKey, $this->apiSecret)
                            ->withHeaders([
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                            ])
                            ->post($url, $data);

            Log::info('Keynua API Response:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Keynua API Error:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return [
                'error' => 'API Error',
                'status' => $response->status(),
                'message' => $response->json()['message'] ?? 'Unknown error',
                'details' => $response->json()
            ];
        } catch (\Exception $e) {
            Log::error('Keynua Service Exception:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'error' => 'Service Exception',
                'message' => $e->getMessage()
            ];
        }
    }
}

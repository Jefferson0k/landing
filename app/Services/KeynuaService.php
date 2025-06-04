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
            // Verificar que las credenciales estén configuradas
            if (!$this->apiKey || !$this->apiSecret) {
                Log::error('Keynua credentials not configured');
                return ['error' => 'Credenciales de Keynua no configuradas'];
            }

            // Crear headers con AWS Signature V4
            $headers = $this->createAwsV4Headers('POST', '/contracts', $data);

            // Log de datos que se van a enviar
            Log::info('Keynua API Request:', [
                'url' => $this->baseUrl . '/contracts',
                'data' => $data,
                'headers' => array_merge($headers, [
                    'Authorization' => substr($headers['Authorization'], 0, 50) . '...'
                ])
            ]);

            $response = Http::withHeaders($headers)->post($this->baseUrl . '/contracts', $data);

            // Log de respuesta completa
            Log::info('Keynua API Response:', [
                'status' => $response->status(),
                'headers' => $response->headers(),
                'body' => $response->body()
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            // Log de error detallado
            Log::error('Keynua API Error:', [
                'status' => $response->status(),
                'body' => $response->body(),
                'headers_sent' => array_merge($headers, [
                    'Authorization' => substr($headers['Authorization'], 0, 50) . '...'
                ])
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

    /**
     * Crear headers con AWS Signature Version 4
     */
    private function createAwsV4Headers($method, $path, $data)
    {
        $host = parse_url($this->baseUrl, PHP_URL_HOST);
        $region = 'us-east-1'; // Región por defecto
        $service = 'execute-api'; // Nombre del servicio correcto para AWS API Gateway
        
        // Timestamp ISO 8601
        $timestamp = gmdate('Ymd\THis\Z');
        $date = gmdate('Ymd');
        
        // Payload (cuerpo de la petición)
        $payload = json_encode($data);
        $payloadHash = hash('sha256', $payload);
        
        // Headers canónicos
        $headers = [
            'host' => $host,
            'x-amz-date' => $timestamp,
            'content-type' => 'application/json',
        ];
        
        // Ordenar headers
        ksort($headers);
        
        // Crear string de headers canónicos
        $canonicalHeaders = '';
        $signedHeaders = '';
        foreach ($headers as $key => $value) {
            $canonicalHeaders .= strtolower($key) . ':' . trim($value) . "\n";
            $signedHeaders .= strtolower($key) . ';';
        }
        $signedHeaders = rtrim($signedHeaders, ';');
        
        // Request canónico
        $canonicalRequest = $method . "\n" .
                           $path . "\n" .
                           '' . "\n" . // Query string vacío
                           $canonicalHeaders . "\n" .
                           $signedHeaders . "\n" .
                           $payloadHash;
        
        // String to sign
        $algorithm = 'AWS4-HMAC-SHA256';
        $credentialScope = $date . '/' . $region . '/' . $service . '/aws4_request';
        $stringToSign = $algorithm . "\n" .
                       $timestamp . "\n" .
                       $credentialScope . "\n" .
                       hash('sha256', $canonicalRequest);
        
        // Calcular signature
        $signature = $this->calculateSignature($this->apiSecret, $date, $region, $service, $stringToSign);
        
        // Authorization header
        $authorization = $algorithm . ' ' .
                        'Credential=' . $this->apiKey . '/' . $credentialScope . ', ' .
                        'SignedHeaders=' . $signedHeaders . ', ' .
                        'Signature=' . $signature;
        
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Host' => $host,
            'X-Amz-Date' => $timestamp,
            'Authorization' => $authorization,
        ];
    }
    
    /**
     * Calcular signature AWS V4
     */
    private function calculateSignature($secret, $date, $region, $service, $stringToSign)
    {
        $kDate = hash_hmac('sha256', $date, 'AWS4' . $secret, true);
        $kRegion = hash_hmac('sha256', $region, $kDate, true);
        $kService = hash_hmac('sha256', $service, $kRegion, true);
        $kSigning = hash_hmac('sha256', 'aws4_request', $kService, true);
        
        return hash_hmac('sha256', $stringToSign, $kSigning);
    }

    /**
     * Método alternativo con diferentes formatos de autenticación
     */
    public function createContractAlternative($data)
    {
        try {
            Log::info('Trying alternative authentication methods');

            // Opción 1: Solo con X-API-Key (sin Authorization)
            $response1 = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-Key' => $this->apiKey,
            ])->post($this->baseUrl . '/contracts', $data);

            if ($response1->successful()) {
                Log::info('Keynua success with X-API-Key only method');
                return $response1->json();
            }

            // Opción 2: Con API Key y Secret como headers separados
            $response2 = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-Key' => $this->apiKey,
                'X-API-Secret' => $this->apiSecret,
            ])->post($this->baseUrl . '/contracts', $data);

            if ($response2->successful()) {
                Log::info('Keynua success with separate headers method');
                return $response2->json();
            }

            // Opción 3: Con Basic Auth
            $response3 = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($this->apiKey . ':' . $this->apiSecret),
            ])->post($this->baseUrl . '/contracts', $data);

            if ($response3->successful()) {
                Log::info('Keynua success with Basic Auth method');
                return $response3->json();
            }

            // Opción 4: Con Bearer token usando API Key
            $response4 = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ])->post($this->baseUrl . '/contracts', $data);

            if ($response4->successful()) {
                Log::info('Keynua success with Bearer API Key method');
                return $response4->json();
            }

            // Opción 5: Con API Key en el cuerpo
            $dataWithAuth = array_merge($data, [
                'api_key' => $this->apiKey,
                'api_secret' => $this->apiSecret,
            ]);
            
            $response5 = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post($this->baseUrl . '/contracts', $dataWithAuth);

            if ($response5->successful()) {
                Log::info('Keynua success with credentials in body method');
                return $response5->json();
            }

            // Opción 6: Con HMAC-SHA256 del payload
            $payload = json_encode($data);
            $signature = hash_hmac('sha256', $payload, $this->apiSecret);
            
            $response6 = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'X-API-Key' => $this->apiKey,
                'X-Signature' => $signature,
            ])->post($this->baseUrl . '/contracts', $data);

            if ($response6->successful()) {
                Log::info('Keynua success with HMAC signature method');
                return $response6->json();
            }

            // Log todos los intentos fallidos
            Log::error('All alternative methods failed:', [
                'method1_status' => $response1->status(),
                'method1_message' => $response1->json()['message'] ?? 'No message',
                'method2_status' => $response2->status(),
                'method2_message' => $response2->json()['message'] ?? 'No message',
                'method3_status' => $response3->status(),
                'method3_message' => $response3->json()['message'] ?? 'No message',
                'method4_status' => $response4->status(),
                'method4_message' => $response4->json()['message'] ?? 'No message',
                'method5_status' => $response5->status(),
                'method5_message' => $response5->json()['message'] ?? 'No message',
                'method6_status' => $response6->status(),
                'method6_message' => $response6->json()['message'] ?? 'No message',
            ]);

            return [
                'error' => 'All authentication methods failed',
                'attempts' => [
                    'X_API_Key_only' => ['status' => $response1->status(), 'message' => $response1->json()['message'] ?? 'No message'],
                    'Separate_headers' => ['status' => $response2->status(), 'message' => $response2->json()['message'] ?? 'No message'],
                    'Basic_Auth' => ['status' => $response3->status(), 'message' => $response3->json()['message'] ?? 'No message'],
                    'Bearer_API_Key' => ['status' => $response4->status(), 'message' => $response4->json()['message'] ?? 'No message'],
                    'Credentials_in_body' => ['status' => $response5->status(), 'message' => $response5->json()['message'] ?? 'No message'],
                    'HMAC_signature' => ['status' => $response6->status(), 'message' => $response6->json()['message'] ?? 'No message'],
                ]
            ];

        } catch (\Exception $e) {
            return [
                'error' => 'Alternative method exception',
                'message' => $e->getMessage()
            ];
        }
    }
}
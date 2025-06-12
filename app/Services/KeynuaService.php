<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KeynuaService
{
    private string $apiUrl;
    private string $apiKey;
    private string $authToken;

    public function __construct()
    {
        $this->apiUrl = config('keynua.api_url');
        $this->apiKey = config('keynua.api_key');
        $this->authToken = config('keynua.auth_token');
    }

    public function crearContrato(string $titulo, string $nombreUsuario, string $correoUsuario): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => $this->authToken,
                'x-api-key' => $this->apiKey,
                'Content-Type' => 'application/json'
            ])->put($this->apiUrl . '/contracts/v1', [
                'title' => $titulo,
                'description' => $titulo,
                'language' => 'es',
                'templateId' => 'keynua-open-default',
                'users' => [
                    [
                        'name' => $nombreUsuario,
                        'email' => $correoUsuario,
                    ]
                ],
                'documents' => [
                    [
                        'name' => 'prueba.pdf',
                        'base64' => 'JVBERi0xLjMNCiXi48/TDQoNCjEgMCBvYmoNCjw8DQovVHlwZSAvQ2F0YWxvZw0KL091dGxpbmVzIDIgMCBSDQovUGFnZXMgMyAwIFINCj4+DQplbmRvYmoNCg0KMiAwIG9iag0KPDwNCi9UeXBlIC9PdXRsaW5lcw0KL0NvdW50IDANCj4+DQplbmRvYmoNCg0KMyAwIG9iag0KPDwNCi9UeXBlIC9QYWdlcw0KL0NvdW50IDINCi9LaWRzIFsgNCAwIFIgNiAwIFIgXSANCj4+DQplbmRvYmoNCg0KNCAwIG9iag0KPDwNCi9UeXBlIC9QYWdlDQovUGFyZW50IDMgMCBSDQovUmVzb3VyY2VzIDw8DQovRm9udCA8PA0KL0YxIDkgMCBSDQo+Pg0KL1Byb2NTZXQgOCAwIFINCj4+DQovTWVkaWFCb3ggWzAgMCA2MTIuMDAwMCA3OTIuMDAwMF0NCi9Db250ZW50cyA1IDAgUg0KPj4NCmVuZG9iag0KDQo1IDAgb2JqDQo8PCAvTGVuZ3RoIDEwNzQgPj4NCnN0cmVhbQ0KMiBKDQpCVA0KMCAwIDAgcmcNCi9GMSAwMDI3IFRmDQo1Ny4zNzUwIDcyMi4yODAwIFRkDQooIEEgU2ltcGxlIFBERiBGaWxlICkgVGoNCkVUDQpCVA0KL0YxIDAwMTAgVGYNCjY5LjI1MDAgNjg4LjYwODAgVGQNCiggVGhpcyBpcyBhIHNtYWxsIGRlbW9uc3RyYXRpb24gLnBkZiBmaWxlIC0gKSBUag0KRXQNCEJ0DQovRjEgMDAxMCBUZg0KNjkuMjUwMCA2NjQuNzA0MCBUZA0KKCBqdXN0IGZvciB1c2UgaW4gdGhlIFZpcnR1YWwgTWVjaGFuaWNzIHR1dG9yaWFscy4gTW9yZSB0ZXh0LiBBbmQgbW9yZSApIFRqDQpFVA0KQlQNCi9GMSAwMDEwIFRmDQo2OS4yNTAwIDY1Mi43NTIwIFRkDQooIHRleHQuIEFuZCBtb3JlIHRleHQuIEFuZCBtb3JlIHRleHQuIEFuZCBtb3JlIHRleHQuICkgVGoNCkVUDQpCVA0KL0YxIDAwMTAgVGYNCjY5LjI1MDAgNjI4Ljg0ODAgVGQNCiggQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgKSBUag0KRXQNCEJ0DQovRjEgMDAxMCBUZg0KNjkuMjUwMCA2MTYuODk2MCBUZA0KKCAgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQm9yaW5nLCB6enp6ei4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kICkgVGoNCkVUDQpCVA0KL0YxIDAwMTAgVGYNCjY5LjI1MDAgNjA0Ljk0NDAgVGQNCiggbW9yZSB0ZXh0LiBBbmQgbW9yZSB0ZXh0LiBBbmQgbW9yZSB0ZXh0LiBBbmQgbW9yZSB0ZXh0LiBBbmQgbW9yZSB0ZXh0LiApIFRqDQpFVA0KQlQNCi9GMSAwMDEwIFRmDQo2OS4yNTAwIDU5Mi45OTIwIFRkDQooIEFuZCBtb3JlIHRleHQuIEFuZCBtb3JlIHRleHQuICkgVGoNCkVUDQpCVA0KL0YxIDAwMTAgVGYNCjY5LjI1MDAgNTY5LjA4ODAgVGQNCiggQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgKSBUag0KRXQNCEJ0DQovRjEgMDAxMCBUZg0KNjkuMjUwMCA1NTcuMTM2MCBUZA0KKCAgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gRXZlbiBtb3JlLiBDb250aW51ZWQgb24gcGFnZSAyIC4uLikgVGoNCkVUDQplbmRzdHJlYW0NCmVuZG9iag0KDQo2IDAgb2JqDQo8PA0KL1R5cGUgL1BhZ2UNCi9QYXJlbnQgMyAwIFINCi9SZXNvdXJjZXMgPDwNCi9Gb250IDw8DQovRjEgOSAwIFIgDQo+Pg0KL1Byb2NTZXQgOCAwIFINCj4+DQovTWVkaWFCb3ggWzAgMCA2MTIuMDAwMCA3OTIuMDAwMF0NCi9Db250ZW50cyA3IDAgUg0KPj4NCmVuZG9iag0KDQo3IDAgb2JqDQo8PCAvTGVuZ3RoIDY3NiA+Pg0Kc3RyZWFtDQoyIEoNCkJUDQowIDAgMCByZw0KL0YxIDAwMjcgVGYNCjU3LjM3NTAgNzIyLjI4MDAgVGQNCiggU2ltcGxlIFBERiBGaWxlIDIgKSBUag0KRXQNCEJ0DQovRjEgMDAxMCBUZg0KNjkuMjUwMCA2ODguNjA4MCBUZA0KKCAuLi5jb250aW51ZWQgZnJvbSBwYWdlIDEuIFlldCBtb3JlIHRleHQuIEFuZCBtb3JlIHRleHQuIEFuZCBtb3JlIHRleHQuICkgVGoNCkVUDQpCVA0KL0YxIDAwMTAgVGYNCjY5LjI1MDAgNjc2LjY1NjAgVGQNCiggQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgdGV4dC4gQW5kIG1vcmUgKSBUag0KRXQNCEJ0DQovRjEgMDAxMCBUZg0KNjkuMjUwMCA2NjQuNzA0MCBUZA0KKCAgdGV4dC4gT2gsIGhvdyBib3JpbmcgdHlwaW5nIHRoaXMgc3R1ZmYuIEJ1dCBub3QgYXMgYm9yaW5nIGFzIHdhdGNoaW5nICkgVGoNCkVUDQpCVA0KL0YxIDAwMTAgVGYNCjY5LjI1MDAgNjUyLjc1MjAgVGQNCiggcGFpbnQgZHJ5LiBBbmQgbW9yZSB0ZXh0LiBBbmQgbW9yZSB0ZXh0LiBBbmQgbW9yZSB0ZXh0LiBBbmQgbW9yZSB0ZXh0LiApIFRqDQpFVA0KQlQNCi9GMSAwMDEwIFRmDQo2OS4yNTAwIDY0MC44MDAwIFRkDQooIEJvcmluZy4gIE1vcmUsIGEgbGl0dGxlIG1vcmUgdGV4dC4gVGhlIGVuZCwgYW5kIGp1c3QgYXMgd2VsbC4gKSBUag0KRXQNKGVUZHN3cmVhbQ0KZW5kb2JqDQoNCjggMCBvYmoNCltdUERGIC9UZXh0XQ0KZW5kb2JqDQoNCjkgMCBvYmoNCjw8DQovVHlwZSAvRm9udA0KL1N1YnR5cGUgL1R5cGUxDQovTmFtZSAvRjENCi9CYXNlRm9udCAvSGVsdmV0aWNhDQovRW5jb2RpbmcgL1dpbkFuc2lFbmNvZGluZw0KPj4NCmVuZG9iag0KDQoxMCAwIG9iag0KPDwNCi9DcmVhdG9yIChSYXZlIFwoaHR0cDovL3d3dy5uZXZyb25hLmNvbS9yYXZlXCkpDQovUHJvZHVjZXIgKE5ldnJvbmEgRGVzaWducykNCi9DcmVhdGlvbkRhdGUgKEQ6MjAwNjAzMDEwNzI4MjYpDQo+Pg0KZW5kb2JqDQoNCnhyZWYNCjAgMTENCjAwMDAwMDAwMDAgNjU1MzUgZg0KMDAwMDAwMDAxOSAwMDAwMCBuDQowMDAwMDAwMDkzIDAwMDAwIG4NCjAwMDAwMDAxNDcgMDAwMDAgbg0KMDAwMDAwMDIyMiAwMDAwMCBuDQowMDAwMDAwMzkwIDAwMDAwIG4NCjAwMDAwMDE1MjIgMDAwMDAgbg0KMDAwMDAwMTY5MCAwMDAwMCBuDQowMDAwMDAyNDIzIDAwMDAwIG4NCjAwMDAwMDI0NTYgMDAwMDAgbg0KMDAwMDAwMjU3NCAwMDAwMCBuDQoNCnRyYWlsZXINCjw8DQovU2l6ZSAxMQ0KL1Jvb3QgMSAwIFINCi9JbmZvIDEwIDAgUg0KPj4NCg0Kc3RhcnR4cmVmDQoyNzE0DQolJUVPRg0K'
                    ]
                ]
            ]);

            if (!$response->successful()) {
                Log::error('Error al crear contrato en Keynua', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                throw new \Exception('Error al crear el contrato');
            }

            return $response->json();
        } catch (\Exception $error) {
            Log::error('Error al crear contrato:', ['error' => $error->getMessage()]);
            throw $error;
        }
    }

    public function crearIdentificacion(string $titulo, string $nombreUsuario, string $correoUsuario, string $documentoUsuario): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => $this->authToken,
                'x-api-key' => $this->apiKey,
                'Content-Type' => 'application/json'
            ])->put($this->apiUrl . '/identity-verification/v1', [
                'title' => $titulo,
                'documentNumber' => $documentoUsuario,
                'documentType' => 'global',
                'userFullName' => $nombreUsuario,
                'userEmail' => $correoUsuario,
                'type' => 'liveness',
                'language' => 'es',
            ]);

            if (!$response->successful()) {
                Log::error('Error al crear identificación en Keynua', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                throw new \Exception('Error al crear la identificación');
            }

            return $response->json();
        } catch (\Exception $error) {
            Log::error('Error al crear identificación:', ['error' => $error->getMessage()]);
            throw $error;
        }
    }
}
<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KeynuaController extends Controller{
    public function crearContrato(Request $request){
        $API_KEY = '42m8MvTF1ma1C9rVqmDoZ75aOxinzYDga7sT5t7J';
        $API_TOKEN = 'ZjA3ZWMwZWEtNGM2OC00ODQ0LWE0MjMtZTY1Y2JiOTlhNzhmOjY2N2Y1NDQzODVlYTQwZTA4NWQ1YzY3OWY1ZGQzZDZmOjkyZTJjNjc0MTZlN2YzMGJjNzMwNGI1YzQwZjg2MmU0YmZkNzE5ZDMzNjc3MTQxMWY2ZTllYTU4YzkxNDFlZTA';

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $API_TOKEN",
            'x-api-key' => $API_KEY
        ])->post('https://api.stg.keynua.com/api/contracts', $request->all());

        return response()->json($response->json(), $response->status());
    }
}

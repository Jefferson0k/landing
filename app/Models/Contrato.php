<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contratos';

    protected $fillable = [
        'title',
        'description',
        'language',
        'template_id',
        'user_name',
        'user_email',
        'user_token',
        'status',
        'keynua_response',
        'documents'
    ];

    protected $casts = [
        'keynua_response' => 'array',
        'documents' => 'array',
    ];

    protected $hidden = [
        'keynua_response'
    ];
}
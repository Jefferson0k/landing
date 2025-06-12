<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identificacion extends Model{
    use HasFactory;
    protected $table = 'identificaciones';
    protected $fillable = [
        'title',
        'document_number',
        'document_type',
        'user_full_name',
        'user_email',
        'type',
        'language',
        'user_token',
        'status',
        'keynua_response'
    ];
    protected $casts = [
        'keynua_response' => 'array',
    ];
    protected $hidden = [
        'keynua_response'
    ];
}
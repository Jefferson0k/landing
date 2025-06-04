<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeynuaSession extends Model{
    protected $fillable = [
        'user_id', 'token', 'status', 'document_name', 'document_url', 'result'
    ];

    protected $casts = [
        'result' => 'array',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

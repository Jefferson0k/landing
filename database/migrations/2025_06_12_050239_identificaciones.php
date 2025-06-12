<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('identificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('document_number');
            $table->string('document_type')->default('global');
            $table->string('user_full_name');
            $table->string('user_email');
            $table->string('type')->default('liveness');
            $table->string('language')->default('es');
            $table->string('user_token')->unique();
            $table->string('status')->nullable();
            $table->json('keynua_response')->nullable();
            $table->timestamps();
        });
    }
    
    public function down(): void{
        Schema::dropIfExists('identificaciones');
    }
};

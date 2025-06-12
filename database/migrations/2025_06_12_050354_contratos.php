<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void{
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('language')->default('es');
            $table->string('template_id')->default('keynua-open-default');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_token')->unique();
            $table->string('status')->nullable();
            $table->json('keynua_response')->nullable();
            $table->json('documents')->nullable();
            $table->timestamps();
        });
    }
    
    public function down(): void{
        Schema::dropIfExists('contratos');
    }
};

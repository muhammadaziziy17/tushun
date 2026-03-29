<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('file_name'); // Original fayl nomi
            $table->string('file_path'); // Serverdagi manzili
            $table->string('title')->nullable(); // Mavzu
            $table->longText('parsed_content')->nullable(); // Fayl ichidagi hamma matn
            $table->longText('ai_explanation')->nullable(); // AI javobi
            $table->enum('status', ['pending', 'processing', 'completed', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presentations');
    }
};

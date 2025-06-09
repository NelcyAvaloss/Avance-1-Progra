<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('categoria');
            $table->string('imagen'); // Ruta de la imagen portada
            $table->string('archivo'); // Ruta del libro PDF/JPG/PNG
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('estado')->default('pendiente');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};

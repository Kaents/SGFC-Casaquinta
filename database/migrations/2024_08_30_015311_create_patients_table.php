<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Nombre del paciente
            $table->string('email')->unique();  // Correo electrónico único
            $table->string('phone')->nullable();  // Número de teléfono
            $table->date('birth_date')->nullable();  // Fecha de nacimiento
            $table->string('gender')->nullable();  // Género (opcional)
            $table->text('address')->nullable();  // Dirección (opcional)
            $table->timestamps();  // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

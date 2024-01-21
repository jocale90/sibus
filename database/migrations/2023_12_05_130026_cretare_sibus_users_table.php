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
        Schema::create('info_usuarios_sibus', function (Blueprint $table) {
            $table->bigIncrements('idusuario');
            $table->integer('idempresaCon');
            $table->string('nombre', 50);
            $table->string('apellido', 50)->nullable();
            $table->string('usuario', 30)->nullable();
            $table->string('contrasena', 10)->nullable();
            $table->dateTime('fecha_creacion')->nullable();
            $table->string('usuario_creacion', 30)->nullable();
            $table->dateTime('fecha_edicion')->nullable();
            $table->string('usuario_edicion', 30)->nullable();
            $table->integer('estado')->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('rut', 15)->nullable();
            $table->timestamps(); // Si deseas campos de fecha de creación y actualización automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_usuarios_sibus');
    }
};

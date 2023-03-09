<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->text('response_api')->nullable();
            $table->dateTime('fecha_registro')->nullable();
            $table->string('porcentaje_sunset')->nullable();
            $table->string('descuento')->nullable();
            $table->string('codigo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_imagenes');
    }
};

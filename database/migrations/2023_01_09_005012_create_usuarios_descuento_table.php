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
        Schema::create('usuarios_descuento', function (Blueprint $table) {
            $table->id();
            $table->string('ip_user')->nullable();
            $table->string('image')->nullable();
            $table->integer('porcentaje_sunset')->nullable();
            $table->string('codigo')->nullable();
            $table->string('descuento')->nullable();
            $table->string('email')->nullable();
            $table->integer('mayor_edad')->nullable();
            $table->integer('tyc')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->date('fecha_proximo_registro')->nullable();

            $table->integer('active')->nullable();
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
        Schema::dropIfExists('usuarios_descuento');
    }
};

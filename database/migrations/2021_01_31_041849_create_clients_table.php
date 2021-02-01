<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('identification')->comment('Identificación');
            $table->enum('identification_type', ['CC', 'RC', 'TI', 'AS', 'MS', 'PA'])->comment('Tipo de Identificación');
            $table->string('first_name')->comment('Primer Nombre');
            $table->string('second_name')->comment('Segundo Nombre')->nullable();
            $table->string('last_name')->comment('Primer Apellido');
            $table->string('second_last_name')->comment('Segundo Apellido')->nullable();
            $table->string('address')->comment('Dirección');
            $table->bigInteger('phone')->comment('Teléfono');
            $table->string('email')->comment('E-Mail');
            $table->string('position')->comment('Ocupación');
            $table->unsignedBigInteger('city_id')->comment('Ciudad departamento y municipio');
            $table->foreign('city_id')->nullable()->references('id')->on('cities');
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
        Schema::dropIfExists('clients');
    }
}

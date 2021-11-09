<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('elector_key')->nullable();
            $table->integer('state_id');
            $table->integer('section_id');
            $table->integer('town_id');
            $table->integer('townhall_id');
            $table->integer('colonia_id');
            $table->string('street');
            $table->string('exterior_no');
            $table->string('interior_no');
            $table->integer('postal_code_id');
            $table->enum('scholarship', ['Ninguna', 'Primaria', 'Secundaria', 'Preparatoria', 'Licenciatura', 'Pos-Grado']);
            $table->enum('gender', ['Mujer', 'Hombre','Otro']);
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->integer('assigned_state_id')->nullable();
            $table->enum('tipo', ['Alcaldía', 'Distrito Federal', 'Distrito Local'])->nullable();
            $table->integer('assigned_zone')->nullable();
            $table->integer('assigned_electoral_sections')->nullable();
            $table->string('district');
            $table->enum('verified', ['SI', "NO"])->nullable();
            $table->integer('assigned_sectional')->nullable();
            $table->string('geo_data')->nullable();
            $table->enum('age', ['16 Años', '17 Años', 'Mayor de edad'])->nullable();
            $table->string('curp')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}

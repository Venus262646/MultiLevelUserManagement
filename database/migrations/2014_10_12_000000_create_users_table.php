<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('first_name');
            $table->string('second_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number');
            $table->string('phone_number_2');
            $table->string('avatar_url')->nullable();
            $table->string('password')->nullable();
            $table->enum('level', ['SuperAdmin', 'Admin', 'Coordinador', 'Seccional', 'Movilizador', 'Familiar', 'Call Center']);
            $table->integer('parent_id')->default(0);
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}

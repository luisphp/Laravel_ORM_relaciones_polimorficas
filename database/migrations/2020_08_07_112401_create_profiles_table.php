<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned(); //
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
            $table->string('web')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->OnDelete('cascade') // Si se elimina un usuario tambien se elemina su profile
            ->OnUpdate('cascade');// Si se actualiza un usuario tambien se actualiza su profile 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

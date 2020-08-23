<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('group_id')->nullable()->unsigned();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')
            ->OnDelete('set null') // Si se elimina un usuario tambien se elemina su profile
            ->OnUpdate('cascade');// Si se actualiza un usuario tambien se actualiza su profile 
            $table->foreign('user_id')->references('id')->on('users')
            ->OnDelete('set null') // Si se elimina un usuario tambien se elemina su profile
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
        Schema::dropIfExists('group_user');
    }
}

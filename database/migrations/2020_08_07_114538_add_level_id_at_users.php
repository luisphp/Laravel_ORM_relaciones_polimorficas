<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelIdAtUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->bigInteger('level_id')->unsigned()->nullable()->after('id');
            $table->foreign('level_id')->references('id')->on('levels')
            ->OnDelete('set null') // Si se elimina un usuario el campo se setea como nulo
            ->OnUpdate('cascade');// Si se actualiza un usuario tambien se actualiza su nivel
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

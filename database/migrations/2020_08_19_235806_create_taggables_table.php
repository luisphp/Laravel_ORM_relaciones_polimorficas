<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggables', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('tag_id')->unsigned();

            $table->morphs('taggable');
            
            $table->timestamps(); 

            $table->foreign('tag_id')->references('id')->on('tags')
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
        Schema::dropIfExists('taggables');
    }
}

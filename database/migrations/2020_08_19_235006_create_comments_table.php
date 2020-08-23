<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('body');

            $table->morphs('commentable');
            
            $table->bigInteger('user_id')->unsigned();

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
        Schema::dropIfExists('comments');
    }
}

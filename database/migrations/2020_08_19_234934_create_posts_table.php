<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')
            ->OnDelete('cascade') // Si se elimina un usuario tambien se elemina su profile
            ->OnUpdate('cascade');// Si se actualiza un usuario tambien se actualiza su profile 
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
        Schema::dropIfExists('posts');
    }
}

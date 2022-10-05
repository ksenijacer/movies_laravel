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
        Schema::create('movie_genre', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->bigInteger('movies_id')->unsigned();
            $table->foreign('movies_id')->references('id')->on('movies')->onDelete('cascade');

            $table->bigInteger('genres_id')->unsigned();
            $table->foreign('genres_id')->references('id')->on('genres')->onDelete('cascade');

            $table->primary(['movies_id', 'genres_id']);
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
        Schema::dropIfExists('movie_genre');
    }
};

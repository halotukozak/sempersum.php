<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songbooks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('password');
            $table->foreignId('owner')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('songbook_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreignId('songbook_id')
                ->references('id')
                ->on('songbooks')
                ->onDelete('cascade');;

            $table->timestamps();

            $table->unique(['user_id', 'songbook_id']);
        });

        Schema::create('song_songbook', function (Blueprint $table) {
            $table->id();

            $table->foreignId('song_id')
                ->references('id')
                ->on('songs')
                ->onDelete('cascade');

            $table->foreignId('songbook_id')
                ->references('id')
                ->on('songbooks')
                ->onDelete('cascade');;

            $table->timestamps();

            $table->unique(['song_id', 'songbook_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songbooks');
    }
}

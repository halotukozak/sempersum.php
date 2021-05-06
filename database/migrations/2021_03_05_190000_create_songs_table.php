<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->text('text');
            $table->string('spotifyId')->nullable();
            $table->string('deezerId')->nullable();
            $table->string('youtubeId')->nullable();
            $table->string('soundcloudId')->nullable();
            $table->boolean('isVerified')->default(false);
            $table->boolean('isOutOfDate')->default(false);

            $table->string('key');
            $table->timestamps();
            $table->softDeletes();


            $table->foreignId('artist_id')
                ->nullable()
                ->references('id')
                ->on('artists')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}

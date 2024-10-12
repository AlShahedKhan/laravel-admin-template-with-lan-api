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
        Schema::create('scorebatterseconds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('series_id')->nullable();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('scoreupdate_id');
            $table->unsignedBigInteger('outby_id');
            $table->unsignedBigInteger('one_id');
            $table->unsignedBigInteger('two_id');
            $table->unsignedBigInteger('three_id');
            $table->unsignedBigInteger('four_id');
            $table->unsignedBigInteger('six_id');
            $table->unsignedBigInteger('balls_played_id');
            $table->timestamps();
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
            $table->foreign('match_id')->references('id')->on('matchhs')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('scoreupdate_id')->references('id')->on('scoreupdates')->onDelete('cascade');
            $table->foreign('outby_id')->references('id')->on('scoreupdates')->onDelete('cascade');
            $table->foreign('one_id')->references('id')->on('scoreupdates')->onDelete('cascade');
            $table->foreign('two_id')->references('id')->on('scoreupdates')->onDelete('cascade');
            $table->foreign('three_id')->references('id')->on('scoreupdates')->onDelete('cascade');
            $table->foreign('four_id')->references('id')->on('scoreupdates')->onDelete('cascade');
            $table->foreign('six_id')->references('id')->on('scoreupdates')->onDelete('cascade');
            $table->foreign('balls_played_id')->references('id')->on('scoreupdates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scorebatterseconds');
    }
};

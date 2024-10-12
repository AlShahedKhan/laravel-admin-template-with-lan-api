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
        Schema::create('scorebowlerfirsts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('series_id')->nullable();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('overs_id');
            $table->unsignedBigInteger('strick_id');
            $table->unsignedBigInteger('maidens_id');
            $table->unsignedBigInteger('runs_id');
            $table->unsignedBigInteger('wickets_id');
            $table->unsignedBigInteger('no_balls_id');
            $table->unsignedBigInteger('wides_id');
            $table->unsignedBigInteger('panalty_runs_id');
            $table->timestamps();
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
            $table->foreign('match_id')->references('id')->on('matchhs')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('overs_id')->references('id')->on('updatebowlers')->onDelete('cascade');
            $table->foreign('strick_id')->references('id')->on('updatebowlers')->onDelete('cascade');
            $table->foreign('maidens_id')->references('id')->on('updatebowlers')->onDelete('cascade');
            $table->foreign('runs_id')->references('id')->on('updatebowlers')->onDelete('cascade');
            $table->foreign('wickets_id')->references('id')->on('updatebowlers')->onDelete('cascade');
            $table->foreign('no_balls_id')->references('id')->on('updatebowlers')->onDelete('cascade');
            $table->foreign('wides_id')->references('id')->on('updatebowlers')->onDelete('cascade');
            $table->foreign('panalty_runs_id')->references('id')->on('updatebowlers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scorebowlerfirsts');
    }
};

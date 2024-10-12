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
        Schema::create('football_rankings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('man_women_id');
            $table->unsignedBigInteger('man_points_id');
            $table->unsignedBigInteger('woman_points_id');
            $table->year('year');
            $table->unsignedTinyInteger('month');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('team_id')->references('id')->on('football_teams')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('football_players')->onDelete('cascade');
            $table->foreign('man_women_id')->references('id')->on('football_players')->onDelete('cascade');
            $table->foreign('man_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('woman_points_id')->references('id')->on('points')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('football_rankings');
    }
};

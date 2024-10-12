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
        Schema::create('rankings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('man_women_id')->default(1);
            $table->unsignedBigInteger('point_id');
            $table->unsignedBigInteger('w_t20_batter_points_id');
            $table->unsignedBigInteger('t20_bowler_points_id');
            $table->unsignedBigInteger('w_t20_bowler_points_id');
            $table->unsignedBigInteger('odi_batter_points_id');
            $table->unsignedBigInteger('w_odi_batter_points_id');
            $table->unsignedBigInteger('odi_bowler_points_id');
            $table->unsignedBigInteger('w_odi_bowler_points_id');
            $table->unsignedBigInteger('test_batter_points_id');
            $table->unsignedBigInteger('w_test_batter_points_id');
            $table->unsignedBigInteger('test_bowler_points_id');
            $table->unsignedBigInteger('w_test_bowler_points_id');
            $table->year('year')->default(2022);
            $table->unsignedTinyInteger('month')->default(1);
            $table->timestamps();

            // Define foreign keys
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('man_women_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('point_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('w_t20_batter_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('t20_bowler_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('w_t20_bowler_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('odi_batter_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('w_odi_batter_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('odi_bowler_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('w_odi_bowler_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('test_batter_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('w_test_batter_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('test_bowler_points_id')->references('id')->on('points')->onDelete('cascade');
            $table->foreign('w_test_bowler_points_id')->references('id')->on('points')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rankings');
    }
};

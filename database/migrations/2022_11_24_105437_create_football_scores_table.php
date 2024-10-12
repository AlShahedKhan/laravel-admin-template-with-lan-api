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
        Schema::create('football_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('team2_id')->nullable();
            $table->unsignedBigInteger('goal_id')->nullable();
            $table->unsignedBigInteger('goal2_id')->nullable();
            $table->unsignedBigInteger('shots_id')->nullable();
            $table->unsignedBigInteger('shots2_id')->nullable();
            $table->unsignedBigInteger('shots_on_target_id')->nullable();
            $table->unsignedBigInteger('shots_on_target2_id')->nullable();
            $table->unsignedBigInteger('prossession_id')->nullable();
            $table->unsignedBigInteger('prossession2_id')->nullable();
            $table->unsignedBigInteger('passes_id')->nullable();
            $table->unsignedBigInteger('passes2_id')->nullable();
            $table->unsignedBigInteger('passes_accuracy_id')->nullable();
            $table->unsignedBigInteger('passes_accuracy2_id')->nullable();
            $table->unsignedBigInteger('fouls_id')->nullable();
            $table->unsignedBigInteger('fouls2_id')->nullable();
            $table->unsignedBigInteger('yellow_cards_id')->nullable();
            $table->unsignedBigInteger('yellow_cards2_id')->nullable();
            $table->unsignedBigInteger('red_cards_id')->nullable();
            $table->unsignedBigInteger('red_cards2_id')->nullable();
            $table->unsignedBigInteger('off_sides_id')->nullable();
            $table->unsignedBigInteger('off_sides2_id')->nullable();
            $table->unsignedBigInteger('corners_id')->nullable();
            $table->unsignedBigInteger('corners2_id')->nullable();
            $table->timestamps();
            $table->foreign('match_id')->references('id')->on('football_matches')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('football_teams')->onDelete('cascade');
            $table->foreign('team2_id')->references('id')->on('football_teams')->onDelete('cascade');
            $table->foreign('goal_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('goal2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('shots_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('shots2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('shots_on_target_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('shots_on_target2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('prossession_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('prossession2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('passes_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('passes2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('passes_accuracy_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('passes_accuracy2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('fouls_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('fouls2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('yellow_cards_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('yellow_cards2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('red_cards_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('red_cards2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('off_sides_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('off_sides2_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('corners_id')->references('id')->on('goal_scores')->onDelete('cascade');
            $table->foreign('corners2_id')->references('id')->on('goal_scores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('football_scores');
    }
};

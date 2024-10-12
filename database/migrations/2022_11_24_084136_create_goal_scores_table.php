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
        Schema::create('goal_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('goal');
            $table->integer('shots');
            $table->integer('shots_on_target');
            $table->integer('prossession');
            $table->integer('passes');
            $table->integer('passes_accuracy');
            $table->integer('fouls');
            $table->integer('yellow_cards');
            $table->integer('red_cards');
            $table->integer('off_sides');
            $table->integer('corners');
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
        Schema::dropIfExists('goal_scores');
    }
};

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
        Schema::create('football_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('team2_id');
            $table->unsignedBigInteger('leagues_id');
            $table->string('match_datetime')->nullable();
            $table->string('is_game_over')->default(0);
            $table->foreign('team_id')->references('id')->on('football_teams')->onDelete('cascade');
            $table->foreign('team2_id')->references('id')->on('football_teams')->onDelete('cascade');
            $table->foreign('leagues_id')->references('id')->on('football_teams')->onDelete('cascade');
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
        Schema::dropIfExists('football_matches');
    }
};

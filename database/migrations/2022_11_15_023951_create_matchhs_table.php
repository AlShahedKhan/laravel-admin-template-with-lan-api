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
        Schema::create('matchhs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('series_id')->nullable();
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('team2_id');
            $table->string('match_datetime')->nullable();
            $table->string('is_game_over')->default(0);
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::dropIfExists('matchhs');
    }
};

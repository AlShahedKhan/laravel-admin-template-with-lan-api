<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->nullable();
            $table->string('team_slug')->nullable();
            $table->string('t_20_ranking')->nullable();
            $table->string('odi_ranking')->nullable();
            $table->string('test_ranking')->nullable();
            $table->string('w_t_20_ranking')->nullable();
            $table->string('w_odi_ranking')->nullable();
            $table->string('w_test_ranking')->nullable();
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
        Schema::dropIfExists('teams');
    }
};

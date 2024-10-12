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
        Schema::create('updatebowlers', function (Blueprint $table) {
            $table->id();
            $table->double('overs')->nullable();
            $table->string('strick')->nullable();
            $table->integer('maidens')->nullable();
            $table->integer('runs')->nullable();
            $table->integer('wickets')->nullable();
            $table->integer('no_balls')->nullable();
            $table->integer('wides')->nullable();
            $table->integer('panalty_runs')->nullable();
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
        Schema::dropIfExists('updatebowlers');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('campeonato');
            $table->string('campeao')->nullable();
            $table->string('vice_campeao')->nullable();
            $table->string('terceiro_campeao')->nullable();
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
        Schema::dropIfExists('campeonatos', function (Blueprint $table) {
            $table->string('campeao');
            $table->string('vice_campeao');
            $table->string('terceiro_campeao');
        });
    }
}

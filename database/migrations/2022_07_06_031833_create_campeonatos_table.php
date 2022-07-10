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
            $table->json('campeao')->nullable();
            $table->json('tCampeao')->nullable();
            $table->json('viceCampeao')->nullable();
            $table->json('jogosQuartasFinais')->nullable();
            $table->json('jogosSemiFinais')->nullable();
            $table->json('semiFinais')->nullable();
            $table->json('jogosFinal')->nullable();
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
            $table->dropColumn('campeao');
            $table->dropColumn('campeao');
            $table->dropColumn('tCampeao');
            $table->dropColumn('viceCampeao');
            $table->dropColumn('jogosQuartasFinais');
            $table->dropColumn('jogosSemiFinais');
            $table->dropColumn('semiFinais');
            $table->dropColumn('jogosFinal');
        });
    }
}

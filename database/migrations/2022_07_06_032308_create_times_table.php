<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('gols')->nullable();
            $table->decimal('gols_sofridos')->nullable();
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
        Schema::dropIfExists('times', function (Blueprint $table) {
            $table->string('nome');
            $table->decimal('gols')->nullable();
            $table->decimal('gols_sofridos')->nullable();
        });
    }
}

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
        Schema::create('rps_metode', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rencana_pembelajaran_id')->constrained('rencana_pembelajaran');
            $table->foreignId('metode_pembelajaran_id')->constrained('metode_pembelajaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rps_metode');
    }
};

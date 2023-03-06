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
        Schema::create('rps_bentuk_daring', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rencana_pembelajaran_id')->constrained('rencana_pembelajaran');
            $table->foreignId('bentuk_id')->constrained('bentuk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rps_bentuk_daring');
    }
};

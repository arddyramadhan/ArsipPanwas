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
        Schema::create('rencana_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->text('tahap_belajar')->nullable();
            $table->text('indikator')->nullable();
            $table->text('kriteria')->nullable();
            $table->text('bentuk')->nullable();
            $table->text('materi')->nullable();
            $table->integer('bobot')->nullable()->default(0);
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
        Schema::dropIfExists('rencana_pembelajaran');
    }
};

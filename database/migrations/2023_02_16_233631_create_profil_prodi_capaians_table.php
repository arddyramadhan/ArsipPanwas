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
        Schema::create('profil_prodi_capaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_prodi_id')->constrained('profil_prodi');
            $table->foreignId('capaian_lulusan_id')->constrained('capaian_lulusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_prodi_capaian');
    }
};

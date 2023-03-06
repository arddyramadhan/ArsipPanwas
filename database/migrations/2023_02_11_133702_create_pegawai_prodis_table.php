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
        Schema::create('pegawai_prodi', function (Blueprint $table) {
            $table->id();
            $table->enum('jabatan', ['kaprodi'])->default('kaprodi')->nullable();
            $table->enum('status', ['aktiv', 'tidak'])->default('aktiv')->nullable();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->foreignId('program_studi_id')->constrained('program_studi');
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
        Schema::dropIfExists('pegawai_prodi');
    }
};

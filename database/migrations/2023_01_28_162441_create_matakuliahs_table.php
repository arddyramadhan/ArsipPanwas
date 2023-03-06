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
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kode')->nullable();
            $table->integer('semester')->nullable()->default(0);
            $table->integer('sks')->nullable()->default(0);
            $table->integer('teori')->nullable()->default(0);
            $table->integer('praktek')->nullable()->default(0);
            $table->integer('lapangan')->nullable()->default(0);
            $table->text('deskripsi')->nullable();
            $table->string('mk_persyaratan')->nullable();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->foreignId('program_studi_id')->constrained('program_studi');
            $table->foreignId('rumpun_id')->constrained('rumpun');
            $table->foreignId('jenis_id')->constrained('jenis');
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
        Schema::dropIfExists('matakuliah');
    }
};

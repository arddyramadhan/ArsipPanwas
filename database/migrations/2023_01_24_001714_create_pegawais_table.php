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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->enum('jk', ['L', 'P'])->default('L')->nullable();
            $table->string('nip')->nullable();
            $table->string('nidn')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('hp')->nullable();
            $table->enum('status', ['dosen', 'operator'])->nullable()->default('dosen');
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->timestamps();

            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};

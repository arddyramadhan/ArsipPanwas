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
        Schema::create('pegawai_jurusan', function (Blueprint $table) {
            $table->id();
            $table->enum('jabatan', ['kajur', 'sekjur'])->default('kajur')->nullable();
            $table->enum('status', ['aktiv', 'tidak'])->default('aktiv')->nullable();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->foreignId('jurusan_id')->constrained('jurusan');
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
        Schema::dropIfExists('pegawai_jurusan');
    }
};

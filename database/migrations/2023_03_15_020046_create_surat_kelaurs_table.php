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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->nullable();
            $table->text('lampiran')->nullable();
            // $table->string('perihal')->nullable();
            $table->string('kepada')->nullable();
            $table->text('isi')->nullable();
            $table->date('tgl_surat')->nullable();
            $table->timestamp('waktu')->nullable();
            $table->string('tempat')->nullable();
            $table->text('tembusan')->nullable();
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
        Schema::dropIfExists('surat_keluar');
    }
};

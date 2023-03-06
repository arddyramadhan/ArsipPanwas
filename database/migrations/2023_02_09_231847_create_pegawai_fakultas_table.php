<?php

use App\Models\Fakultas;
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
        Schema::create('pegawai_fakultas', function (Blueprint $table) {
            $table->id();
            $table->enum('jabatan', ['dekan','wadek'])->default('dekan')->nullable();
            $table->enum('status', ['aktiv','tidak'])->default('aktiv')->nullable();
            $table->string('urutan')->nullable();
            $table->foreignId('pegawai_id')->constrained('pegawai');
            $table->foreignId('fakultas_id')->constrained('fakultas');
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
        Schema::dropIfExists('pegawai_fakultas');
    }
};

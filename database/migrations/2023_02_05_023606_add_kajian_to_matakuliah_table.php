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
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->text('kajian')->nullable()->after('deskripsi');
            $table->text('pustaka_utama')->nullable()->after('kajian');
            $table->text('pustaka_pendukung')->nullable()->after('pustaka_utama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->drop('kajian');
            $table->drop('pustaka_utama');
            $table->drop('pustaka_pendukung');
        });
    }
};

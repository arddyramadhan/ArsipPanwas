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
        Schema::table('jurusan', function (Blueprint $table) {
            $table->enum('jenjang', ['s1','s2','s3'])->nullable()->default('s1')->after('fakultas_id');
        });

        Schema::table('matakuliah', function (Blueprint $table) {
            $table->integer('urutan')->nullable()->after('kode');
            $table->string('jenjang')->nullable()->after('urutan');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurusan', function (Blueprint $table) {
            $table->dropColumn('jenjang');
        });
        Schema::table('matakuliah', function (Blueprint $table) {
            $table->dropColumn('urutan');
            $table->dropColumn('jenjang');
        });
    }
};

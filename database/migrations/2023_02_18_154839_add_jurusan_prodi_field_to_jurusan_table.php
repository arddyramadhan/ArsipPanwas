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
        Schema::table('fakultas', function (Blueprint $table) {
            $table->string('universitas')->nullable()->after('alamat');
            $table->string('nilai_universitas')->nullable()->after('universitas');
        });
        Schema::table('program_studi', function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::table('program_studi', function (Blueprint $table) {
            $table->string('kode')->nullable();
            $table->string('akreditas')->nullable();
            $table->date('tgl_berdiri')->nullable();
            $table->string('penandatangan_sk')->nullable();
            $table->date('bulan_tahun_prodi')->nullable();
            $table->string('sk_penyelenggaraan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pos')->nullable();
            $table->string('tlp')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('kompetensi_lulusan')->nullable();
            $table->text('tujuan_prodi')->nullable();
            $table->text('strategi_pencapaian')->nullable();
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
        Schema::table('fakultas', function (Blueprint $table) {
            $table->dropColumn('universitas');
            $table->dropColumn('nilai_universitas');
        });
        Schema::table('program_studi', function (Blueprint $table) {
            $table->dropColumn('kode');
            $table->dropColumn('akreditas');
            $table->dropColumn('tgl_berdiri');
            $table->dropColumn('penendatangan_sk');
            $table->dropColumn('bulan_tahun_prodi');
            $table->dropColumn('sk_penyelenggaraan');
            $table->dropColumn('alamat');
            $table->dropColumn('pos');
            $table->dropColumn('tlp');
            $table->dropColumn('fax');
            $table->dropColumn('email');
            $table->dropColumn('web');
            $table->dropColumn('deskripsi');
            $table->dropColumn('visi');
            $table->dropColumn('misi');
            $table->dropColumn('kompetensi_lulusan');
            $table->dropColumn('tujuan_prodi');
            $table->dropColumn('strategi_pencapaian');
        });
    }
};

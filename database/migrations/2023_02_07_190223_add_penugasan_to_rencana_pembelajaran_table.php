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
        Schema::table('rencana_pembelajaran', function (Blueprint $table) {
            $table->text('penugasan_luring')->nullable()->after('bentuk');
            $table->text('penugasan_daring')->nullable()->after('penugasan_luring');
            $table->integer('urutan')->nullable()->default(1)->after('materi');
            $table->foreignId('matakuliah_id')->constrained('matakuliah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rencana_pembelajaran', function (Blueprint $table) {
            $table->dropColumn('penugasan_luring');
            $table->dropColumn('penugasan_daring');
            $table->dropColumn('urutan');
        });
    }
};

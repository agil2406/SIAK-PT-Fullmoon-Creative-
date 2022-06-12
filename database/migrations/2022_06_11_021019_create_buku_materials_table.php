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
        Schema::create('buku_materials', function (Blueprint $table) {
            $table->id();
            $table->string('uraian_bm', 191);
            $table->integer('volume_bm');
            $table->string('satuan_bm', 191);
            $table->string('noBukti_bm', 191);
            $table->integer('jumlah_bm');
            $table->date('tanggal_bm');
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
        Schema::dropIfExists('buku_materials');
    }
};

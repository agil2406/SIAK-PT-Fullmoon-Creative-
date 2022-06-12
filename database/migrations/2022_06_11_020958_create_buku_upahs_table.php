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
        Schema::create('buku_upahs', function (Blueprint $table) {
            $table->id();
            $table->string('uraian_bu', 191);
            $table->integer('volume_bu')->nullable();
            $table->string('satuan_bu', 191)->nullable();
            $table->string('noBukti_bu', 191);
            $table->integer('jumlah_bu');
            $table->date('tanggal_bu');
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
        Schema::dropIfExists('buku_upahs');
    }
};

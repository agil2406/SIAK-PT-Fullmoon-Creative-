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
        Schema::create('buku_kas', function (Blueprint $table) {
            $table->id();

            $table->string('uraian_bk', 191);
            $table->integer('volume_bk')->nullable();
            $table->string('satuan_bk', 191)->nullable();
            $table->string('jenisKas_bk', 191)->nullable();
            $table->string('noBukti_bk', 191);
            $table->integer('penerimaan_bk')->nullable();
            $table->integer('pengeluaran_bk')->nullable();
            $table->integer('saldo_bk');
            $table->date('tanggal_bk');
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
        Schema::dropIfExists('buku_kas');
    }
};

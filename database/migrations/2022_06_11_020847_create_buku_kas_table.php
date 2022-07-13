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

            $table->string('uraian', 191)->nullable();
            $table->integer('harga')->nullable();
            $table->float('volume')->nullable();
            $table->string('satuan', 191)->nullable();
            $table->string('noBukti', 191)->nullable();
            $table->integer('penerimaan')->nullable();
            $table->integer('pengeluaran')->nullable();
            $table->integer('saldo')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('master_id');
            $table->foreignId('proyek_id');
            $table->date('tanggal');
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

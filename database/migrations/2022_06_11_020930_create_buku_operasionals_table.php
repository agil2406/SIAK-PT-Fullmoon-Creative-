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
        Schema::create('buku_operasionals', function (Blueprint $table) {
            $table->id();
            $table->string('uraian_bo', 191);
            $table->integer('volume_bo')->nullable();
            $table->string('satuan_bo', 191)->nullable();
            $table->string('noBukti_bo', 191);
            $table->integer('jumlah_bo');
            $table->date('tanggal_bo');
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
        Schema::dropIfExists('buku_operasionals');
    }
};

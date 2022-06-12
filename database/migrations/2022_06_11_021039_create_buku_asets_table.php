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
        Schema::create('buku_asets', function (Blueprint $table) {
            $table->id();
            $table->string('uraian_ba', 191);
            $table->integer('volume_ba');
            $table->string('satuan_ba', 191);
            $table->string('noBukti_ba', 191);
            $table->integer('jumlah_ba');
            $table->date('tanggal_ba');
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
        Schema::dropIfExists('buku_asets');
    }
};

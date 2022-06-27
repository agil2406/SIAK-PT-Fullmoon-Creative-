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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();

            $table->string('nama_proyek');
            $table->text('alamat_proyek');
            $table->date('tgl_awalproyek');
            $table->date('tgl_akhirproyek');
            $table->integer('rab_proyek');
            $table->integer('progres_proyek')->nullable();
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
        Schema::dropIfExists('proyeks');
    }
};

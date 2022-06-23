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
        Schema::create('rekaps', function (Blueprint $table) {
            $table->id();

            $table->integer('sk_bl')->nullable();
            $table->integer('sb_bl')->nullable();
            $table->integer('in_cash')->nullable();
            $table->integer('trf_kppn')->nullable();
            $table->integer('bunga_bnk')->nullable();
            $table->integer('total_aset')->nullable();
            $table->integer('total_material')->nullable();
            $table->integer('total_operasional')->nullable();
            $table->integer('total_upah')->nullable();
            $table->integer('pph')->nullable();
            $table->integer('admin_bank')->nullable();
            $table->integer('sk_bi')->nullable();
            $table->integer('sb_bi')->nullable();
            $table->integer('status')->nullable();
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
        //
    }
};

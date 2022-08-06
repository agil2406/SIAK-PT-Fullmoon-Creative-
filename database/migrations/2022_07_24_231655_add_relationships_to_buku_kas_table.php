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
        Schema::table('buku_kas', function (Blueprint $table) {
            $table->foreign('master_id')->references('id')->on('masters')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('proyek_id')->references('id')->on('proyeks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buku_kas', function (Blueprint $table) {
            $table->dropForeign(['master_id']);
            $table->dropForeign(['proyek_id']);
        });
    }
};

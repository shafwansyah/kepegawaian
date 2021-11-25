<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->time('jamMasuk')->nullable();
            $table->time('jamKeluar')->nullable();
            $table->boolean('masuk')->nullable();
            $table->boolean('keluar')->nullable();
            $table->string('fotoMasuk')->nullable();
            $table->string('fotoKeluar')->nullable();
            $table->string('pegawaiId');
            $table->timestamps();
        });

        // Schema::table('absens', function (Blueprint $table) {
        //     $table->time('jamMasuk')->nullable()->change();
        //     $table->time('jamKeluar')->nullable()->change();
        //     $table->boolean('masuk')->nullable()->change();
        //     $table->boolean('keluar')->nullable()->change();
        //     $table->string('fotoMasuk')->nullable()->change();
        //     $table->string('fotoKeluar')->nullable()->change();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absens');
    }
}

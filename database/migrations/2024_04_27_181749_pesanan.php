<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('layanan')->nullable();
            $table->string('masalah')->nullable();
            $table->string('id_pelanggan')->nullable();
            $table->string('id_admin')->nullable();
            $table->string('id_teknisi')->nullable();
            $table->string('harga_jasa')->nullable();
            $table->string('harga_alat')->nullable();
            $table->date('tgl_pesan_awal')->nullable();
            $table->date('tgl_pesan_selesai')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('status')->default(0);
            $table->string('deskripsi')->nullable();
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
        Schema::dropIfExists('pesanan');
    }
}

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
            $table->string('layanan');
            $table->string('masalah');
            $table->string('id_pelanggan');
            $table->string('id_admin');
            $table->string('id_teknisi');
            $table->string('harga_jasa');
            $table->string('harga_alat');
            $table->date('tgl_pesan_awal')->nullable();
            $table->date('tgl_pesan_selesai')->nullable();
            $table->integer('status')->default(0);
            $table->string('deskripsi');
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

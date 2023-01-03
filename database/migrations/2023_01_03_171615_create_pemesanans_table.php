<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            
            $table->date("tanggal_kunjungan");
            $table->date("tanggal_pemesanan");
            $table->integer("total_bayar");
            $table->integer("jumlah_tiket");
            $table->integer("id_pemesan");
            $table->string("id_tiket");
            $table->string("status");
            $table->string("kode");

            $table->string("nama_pengunjung");
            $table->string("email_pengunjung");
            $table->string("nomor_pengunjung");
            $table->longText("permintaan")->nullable();

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
        Schema::dropIfExists('pemesanans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_travel');
            $table->longText('deskripsi');
            $table->integer('id_kategori');

            $table->longText('alamat');
            $table->integer('provinces_id');
            $table->integer('regencies_id');
            $table->integer('districts_id');
            $table->integer('villages_id');
            $table->longText('gmap_link')->nullable();

            $table->string('slug')->unique();
            $table->integer('status');
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
        Schema::dropIfExists('travel');
    }
}

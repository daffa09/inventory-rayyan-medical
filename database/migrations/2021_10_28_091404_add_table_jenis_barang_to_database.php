<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableJenisBarangToDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Jenis_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_barang')->unique();
            $table->text('nama_barang');
            $table->text('image')->nullable();
            $table->integer('stok');
            $table->bigInteger('harga');
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
        Schema::dropIfExists('Jenis_barang');
    }
}

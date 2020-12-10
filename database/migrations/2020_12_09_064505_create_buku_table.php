<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tgl_terbit');
            $table->integer('jumlah');
            // $table->boolean('status')->default('1');
            $table->unsignedBigInteger('id_penulis');
            $table->unsignedBigInteger('id_penerbit');
            $table->unsignedBigInteger('id_kategori');

            $table->foreign('id_penulis')->references('id')->on('penulis')->onDelete('cascade');
            $table->foreign('id_penerbit')->references('id')->on('penerbit')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');

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
        Schema::dropIfExists('buku');
    }
}

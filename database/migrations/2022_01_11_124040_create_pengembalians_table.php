<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_barang')->unsigned();
            $table->bigInteger('id_peminjam')->unsigned();
            $table->integer('jumlah_kembali');
            $table->date('tgl_kembali');

   

            $table->foreign('id_barang')->references('id')
            ->on('barangs')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('id_peminjam')->references('id')
            ->on('peminjams')->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('pengembalians');
    }
}

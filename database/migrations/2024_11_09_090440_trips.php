<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('wisata');               // Nama wisata
            $table->string('author');               // Penulis/author
            $table->text('body');                   // Deskripsi trip
            $table->string('link');                 // Link pembayaran atau info tambahan
            $table->integer('stok');                // Jumlah stok 
            $table->binary('image')->nullable();    
            $table->binary('image1')->nullable();   // Gambar  (binary)
            $table->binary('image2')->nullable();   
            $table->binary('image3')->nullable();   
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
        Schema::dropIfExists('trips');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // jika menggunakan DB::statement()

return new class extends Migration
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
            $table->string('wisata');              
            $table->string('author');               
            $table->text('body');                  
            $table->string('link');                
            $table->integer('stok');                
            $table->timestamps();                   
        });
        DB::statement("ALTER TABLE trips ADD image MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE trips ADD image1 MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE trips ADD image2 MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE trips ADD image3 MEDIUMBLOB NULL");
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
};

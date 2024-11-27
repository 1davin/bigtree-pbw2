<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('wisata', 255);
            $table->string('author', 255);
            $table->string('linkPayment', 255);
            $table->decimal('harga', 10, 2);
            $table->text('body');
            $table->timestamps();
        });

       
        DB::statement("ALTER TABLE posts ADD image MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE posts ADD image1 MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE posts ADD image2 MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE posts ADD image3 MEDIUMBLOB NULL");
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

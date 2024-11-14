<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('wisata', 255);
            $table->string('author', 255);
            $table->string('linkPayment', 255);
            $table->decimal('harga', 10, 2);
            $table->text('body');
            $table->binary('image')->nullable(); 
            $table->binary('image1')->nullable();
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
        Schema::dropIfExists('posts');
    }
}

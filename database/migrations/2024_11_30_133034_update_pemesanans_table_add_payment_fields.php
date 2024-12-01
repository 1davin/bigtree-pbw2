<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            if (!Schema::hasColumn('pemesanans', 'total_harga')) {
                $table->integer('total_harga')->after('jumlah_tiket');
            }
            if (!Schema::hasColumn('pemesanans', 'status_pembayaran')) {
                $table->string('status_pembayaran')->default('unpaid')->after('total_harga');
            }
            $table->integer('total_harga')->default(0)->change();

        });
    }
    
    public function down()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            if (Schema::hasColumn('pemesanans', 'total_harga')) {
                $table->dropColumn('total_harga');
            }
            if (Schema::hasColumn('pemesanans', 'status_pembayaran')) {
                $table->dropColumn('status_pembayaran');
            }
        });
    }
    
    
};

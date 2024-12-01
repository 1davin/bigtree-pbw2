<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaWisataAndStatusPembayaranToPemesanansTable extends Migration
{
    public function up()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->string('nama_wisata')->after('post_id');
            $table->string('status_pembayaran')->default('pending')->after('jumlah_tiket');
            $table->integer('total_harga')->default(0)->change();

        });
    }

    public function down()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropColumn(['nama_wisata', 'status_pembayaran']);
        });
    }
}

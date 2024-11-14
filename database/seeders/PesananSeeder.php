<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "nama_penumpang" => "cepin",
                "nomor_kursi" => "17",
                "kelas_angkutan" => "vip",
                "stasiun_tujuan" => "Aceh",
                "stasiun_keberangkatan" => "Medan",
                "tanggal_pesan" => "2005-04-17 10:00:00",
                "tanggal_keberangkatan" => "2005-04-18",
                "harga_tiket" => "10000"
            ],
            [
                "nama_penumpang" => "akbar",
                "nomor_kursi" => "18",
                "kelas_angkutan" => "vip",
                "stasiun_tujuan" => "Aceh",
                "stasiun_keberangkatan" => "Medan",
                "tanggal_pesan" => "2005-04-17 10:00:00",
                "tanggal_keberangkatan" => "2005-04-18",
                "harga_tiket" => "10000"
            ],
            [
                "nama_penumpang" => "parid",
                "nomor_kursi" => "20",
                "kelas_angkutan" => "vip",
                "stasiun_tujuan" => "Aceh",
                "stasiun_keberangkatan" => "Medan",
                "tanggal_pesan" => "2005-04-17 10:00:00",
                "tanggal_keberangkatan" => "2005-04-18",
                "harga_tiket" => "10000"
            ]
        ];

        // Use insert instead of create for multiple records
        Pesanan::insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Pesan1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                "nama" => "cepin",
                "tanggal_pesan" => "2024-4-24",
                "tanggal_masuk"=>"2024-4-28",
                "nama_destinasi"=>"kawah puteh",
                "harga"=>"101000"

                
            ],
            [
                "nama" => "ahmad",
                "tanggal_pesan" => "2024-5-30",
                "tanggal_masuk"=>"2024-6-14",
                "nama_destinasi"=>"kawah hitam",
                "harga"=>"200200"
             
            ]
            ];
            Pesan::insert($data);
    }
}

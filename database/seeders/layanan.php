<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class Layanan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'layanan' => 'Mesin Cuci',
                'deskripsi' => 'Mesin Cuci',
                'gambar' => '',
                'teknisi' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'layanan' => 'Televisi',
                'deskripsi' => 'Televisi',
                'gambar' => '',
                'teknisi' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'layanan' => 'Laptop',
                'deskripsi' => 'Laptop',
                'gambar' => '',
                'teknisi' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];
        DB::table('layanan')->insert($data);
    }
}

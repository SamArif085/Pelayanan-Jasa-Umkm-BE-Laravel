<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' =>  Hash::make('admin'),
                'no_telp' => 'null',
                'role' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Teknisi',
                'username' => 'alda',
                'password' =>  Hash::make('alda'),
                'no_telp' => 'null',
                'role' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Teknisi',
                'username' => 'sam',
                'password' =>  Hash::make('sam'),
                'no_telp' => 'null',
                'role' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Teknisi',
                'username' => 'rene',
                'password' =>  Hash::make('rene'),
                'no_telp' => 'null',
                'role' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Pelanggan',
                'username' => 'clara',
                'password' =>  Hash::make('clara'),
                'no_telp' => 'null',
                'role' => '3',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('users')->insert($data);
    }
}

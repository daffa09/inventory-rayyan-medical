<?php

namespace Database\Seeders;

use App\Models\DataBarang;
use App\Models\JenisBarang;
use App\Models\PesanBarang;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();



        User::create([
            'nama' => 'Daffa Fathan',
            'username' => 'Fanthom',
            'alamat' => 'Disini',
            'email' => 'daffa@gmail.com',
            'no_telp' => '+62123456789',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);

        User::create([
            'nama' => 'Grey',
            'username' => 'Grey',
            'alamat' => 'Disini',
            'email' => 'grey@gmail.com',
            'no_telp' => '+62123456787',
            'password' => bcrypt('password'),
            'is_karyawan' => true
        ]);

        // User::create([
        //     'nama' => 'Morgan',
        //     'username' => 'Morgan',
        //     'alamat' => 'Disini',
        //     'email' => 'morgan@gmail.com',
        //     'no_telp' => '+62123456785',
        //     'password' => bcrypt('password'),
        //     'is_karyawan' => true
        // ]);

        // JenisBarang::create([
        //     'kode_barang' => 101,
        //     'nama_barang' => 'Tabung Oksigen 1m3',
        //     'stok' => 100,
        //     'harga' => 650000
        // ]);

        // JenisBarang::create([
        //     'kode_barang' => 102,
        //     'nama_barang' => 'Tabung Oksigen 1m2',
        //     'stok' => 100,
        //     'harga' => 700000
        // ]);

        // JenisBarang::create([
        //     'kode_barang' => 103,
        //     'nama_barang' => 'Termometer',
        //     'stok' => 100,
        //     'harga' => 100000
        // ]);

        // DataBarang::factory(10)->create();


        PesanBarang::factory(10)->create();
    }
}

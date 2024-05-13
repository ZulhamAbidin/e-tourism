<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate dummy users
        DB::table('users')->insert([
            'name' => 'astriayu',
            'alamat' => 'gowa sarana indah',
            'nohp' => '0895801138822',
            'email' => 'astriayu@gmail.com',
            'password' => bcrypt('astriayu'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // // Generate dummy destinasi_kuliner
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('destinasi_kuliner')->insert([
        //         'nama' => 'Kuliner ' . ($i + 1),
        //         'alamat' => 'Alamat Kuliner ' . ($i + 1),
        //         'JamBuka' => '08:00',
        //         'Deskripsi' => 'Deskripsi Kuliner ' . ($i + 1),
        //         'latitude' => $this->getRandomLatitude(),
        //         'longitude' => $this->getRandomLongitude(),
        //         'sampul' => 'images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg', // Gambar default dari public/images
        //         'gambar' => json_encode(['images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg', 'images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg']), // Contoh gambar dari public/images
        //         'MenuKuliner' => 'Menu Kuliner ' . ($i + 1),
        //         'rating' => rand(1, 5),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // // Generate dummy destinasi_wisata
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('destinasi_wisata')->insert([
        //         'nama' => 'Wisata ' . ($i + 1),
        //         'alamat' => 'Alamat Wisata ' . ($i + 1),
        //         'HargaTiket' => 'Rp 50.000',
        //         'FasilitasDestinasi' => 'Fasilitas Wisata ' . ($i + 1),
        //         'JamBuka' => '08:00',
        //         'Deskripsi' => 'Deskripsi Wisata ' . ($i + 1),
        //         'Sejarah' => 'Sejarah Wisata ' . ($i + 1),
        //         'latitude' => $this->getRandomLatitude(),
        //         'longitude' => $this->getRandomLongitude(),
        //         'sampul' => 'images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg', // Gambar default dari public/images
        //         'gambar' => json_encode(['images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg', 'images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg']), // Contoh gambar dari public/images
        //         'rating' => rand(1, 5),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // // Generate dummy destinasi_hotel
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('destinasi_hotel')->insert([
        //         'nama' => 'Hotel ' . ($i + 1),
        //         'alamat' => 'Alamat Hotel ' . ($i + 1),
        //         'JamBuka' => '08:00',
        //         'Deskripsi' => 'Deskripsi Hotel ' . ($i + 1),
        //         'latitude' => $this->getRandomLatitude(),
        //         'longitude' => $this->getRandomLongitude(),
        //         'sampul' => 'images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg', // Gambar default dari public/images
        //         'gambar' => json_encode(['images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg', 'images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg']), // Contoh gambar dari public/images
        //         'rating' => rand(1, 5),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // // Generate dummy kebudayaan
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('kebudayaan')->insert([
        //         'nama' => 'Kebudayaan ' . ($i + 1),
        //         'deskripsi' => 'Deskripsi Kebudayaan ' . ($i + 1),
        //         'sampul' => 'images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg', // Gambar default dari public/images
        //         'gambar' => json_encode(['images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg', 'images/3hBCPes20MxnkluKtJFqdnscBoV1il5bCYJo4ZJn.jpg']), // Contoh gambar dari public/images
        //         'rating' => rand(1, 5),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }

    // // Method untuk mendapatkan latitude acak
    // private function getRandomLatitude()
    // {
    //     return mt_rand(-90000000, 90000000) / 1000000;
    // }

    // // Method untuk mendapatkan longitude acak
    // private function getRandomLongitude()
    // {
    //     return mt_rand(-180000000, 180000000) / 1000000;
    // }
}



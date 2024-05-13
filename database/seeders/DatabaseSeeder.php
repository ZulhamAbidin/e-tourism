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
        DB::table('users')->insert([
            'name' => 'soppeng',
            'alamat' => 'gowa sarana indah',
            'nohp' => '0895801138822',
            'email' => 'soppeng@gmail.com',
            'password' => bcrypt('soppeng'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

}
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // role
            ['name' => 'Admin', 'email' => 'admin@sekolah.com', 'role' => 'admin', 'password' => bcrypt('admin')],
            ['name' => 'Guru ATT', 'email' => 'guruatt@sekolah.com', 'role' => 'guru', 'password' => bcrypt('guru')],
            ['name' => 'Wali Kelas 5', 'email' => 'walikelas@sekolah.com', 'role' => 'walikelas', 'password' => bcrypt('walikelas')],

        ];

        DB::table('users')->insert($items);
    }
}

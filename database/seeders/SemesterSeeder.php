<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [

            ['tahun_ajaran_id' => '1', 'nama_semester' => 'Ganjil', 'aktif' => '1'],
            ['tahun_ajaran_id' => '1', 'nama_semester' => 'Genap', 'aktif' => '0']
        ];

        DB::table('semester')->insert($items);
    }
}

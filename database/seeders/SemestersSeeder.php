<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [

            ['tahun_ajaran_id' => '1','nama_semester' => 'ganjil', 'status' => 'aktif'],
            ['tahun_ajaran_id' => '1','nama_semester' => 'genap', 'status'=> 'nonaktif']
        ];
    }
}

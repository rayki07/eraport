<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['nama_pelajaran' => 'ATT', 'aktif' => '1'],
            ['nama_pelajaran' => 'Kesenian', 'aktif' => '1']
        ];

        DB::table('mapel')->insert($items);
    }
}

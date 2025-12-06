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
            ['nama_pelajaran' => 'ATT'],
            ['nama_pelajaran' => 'Kesenian']
        ];

        DB::table('mapel')->insert($items);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['rombel' => '5', 'nama_kelas' => 'Bahrain', 'tahun_ajaran_id' => '1'],
            ['rombel' => '5', 'nama_kelas' => 'Oman', 'tahun_ajaran_id' => '1'],
            ['rombel' => '4', 'nama_kelas' => 'Tunisia', 'tahun_ajaran_id' => '1']
        ];

        DB::table('kelas')->insert($items);
    }
}

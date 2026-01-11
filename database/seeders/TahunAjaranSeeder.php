<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TahunAjaran;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['tahun_mulai' => '2021', 'tahun_selesai'=> '2022', 'aktif' => '0'],
            ['tahun_mulai' => '2022', 'tahun_selesai'=> '2023', 'aktif' => '0'],
            ['tahun_mulai' => '2023', 'tahun_selesai'=> '2024', 'aktif' => '0'],
            ['tahun_mulai' => '2024', 'tahun_selesai'=> '2025', 'aktif' => '0'],
            ['tahun_mulai' => '2025', 'tahun_selesai'=> '2026', 'aktif' => '1'],
        ];

        DB::table("tahun_ajaran")->insert($items);
    }
}

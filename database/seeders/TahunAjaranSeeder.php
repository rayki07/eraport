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

            ['tahun_mulai' => '2025', 'tahun_selesai'=> '2026', 'status' => 'aktif'],
        ];

        DB::table("tahun_ajaran")->insert($items);
    }
}

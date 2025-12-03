<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['nip' => '001', 'nama_lengkap' => 'Firman Wahyudi', 'nama_panggilan' => 'Firman', 'gender' => 'L'],
        ];

        DB::table('guru')->insert($items);
    }
}

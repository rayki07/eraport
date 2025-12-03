<?php

namespace Database\Seeders;

use App\Models\UjianItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UjianItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UjianItem::factory()->count(1)->create();
    }
}

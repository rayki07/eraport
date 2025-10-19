<?php

namespace Database\Seeders;
use App\Models\Grades;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grades::factory(1)->create();
    }
}

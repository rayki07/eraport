<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //make use of factory to create students
        Students::factory(10)->create();    
    }
}
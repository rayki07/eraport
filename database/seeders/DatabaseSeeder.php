<?php

namespace Database\Seeders;

use App\Models\Lessons;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(TahunAjaranSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(UjianSeeder::class);
        $this->call(UjianItemSeeder::class);

       /*  $this->call(GradesStudentsSeeder::class);
        $this->call(TeachersSeeder::class);
        $this->call(LessonsSeeder::class); */
        
    }
}

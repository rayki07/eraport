<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ujian_item>
 */
class UjianItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ujian_id' => ('1'),
            'nama_item' => ('Doa Mau Makan'),
            'kategori' => ('Doa')
        ];
    }
}

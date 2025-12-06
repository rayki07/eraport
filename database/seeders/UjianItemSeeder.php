<?php

namespace Database\Seeders;

use App\Models\UjianItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UjianItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [

            // Tahsinul Kitabah
            ['mapel_id' => '1', 'ujian_id' => '9', 'kategori' => 'tahsinul kitabah', 'nama_item' => 'Tahsinul Kitabah'],

            // Adab
            ['mapel_id' => '1', 'ujian_id' => '1', 'kategori' => 'Adab', 'nama_item' => 'Adab'],

            // ============================
            // HADIS (4)
            // ============================
            ['mapel_id' => '1', 'ujian_id' => '7', 'kategori' => 'hadis', 'nama_item' => 'Hadis memuliakan tamu'],
            ['mapel_id' => '1', 'ujian_id' => '7', 'kategori' => 'hadis', 'nama_item' => 'Hadis jangan berburuk sangka'],
            ['mapel_id' => '1', 'ujian_id' => '7', 'kategori' => 'hadis', 'nama_item' => 'Hadis rukun islam'],
            ['mapel_id' => '1', 'ujian_id' => '7', 'kategori' => 'hadis', 'nama_item' => 'Hadis rukun iman'],

            // ============================
            // DOA (4)
            // ============================
            ['mapel_id' => '1', 'ujian_id' => '6', 'kategori' => 'doa', 'nama_item' => 'Doa ketika ada petir'],
            ['mapel_id' => '1', 'ujian_id' => '6', 'kategori' => 'doa', 'nama_item' => 'Doa pembuka acara'],
            ['mapel_id' => '1', 'ujian_id' => '6', 'kategori' => 'doa', 'nama_item' => 'Doa menjadi anak soleh'],
            ['mapel_id' => '1', 'ujian_id' => '6', 'kategori' => 'doa', 'nama_item' => 'Doa mendengar berita duka'],

            // ============================
            // SURAH JUZ 28
            // ============================
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'Al-Mujadilah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'Al-Hasyr'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'Al-Mumtahanah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'As-Saff'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'Al-Jumu’ah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'Al-Munafiqun'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'At-Taghabun'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'At-Talaq'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 28', 'nama_item' => 'At-Tahrim'],

            // ============================
            // SURAH JUZ 29
            // ============================
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Mulk'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Qalam'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Haqqah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Ma’arij'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Nuh'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Jinn'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Muzzammil'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Muddassir'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Qiyamah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Insan'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 29', 'nama_item' => 'Al-Mursalat'],

            // ============================
            // SURAH JUZ 30
            // ============================
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'An-Naba'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'An-Nazi’at'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Abasa'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'At-Takwir'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Infitar'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Mutaffifin'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Insyiqaq'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Buruj'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'At-Tariq'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-A’la'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Ghashiyah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Fajr'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Balad'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Asy-Syams'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Layl'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Adh-Dhuha'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Asy-Syarh'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'At-Tin'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Alaq'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Qadr'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Bayyinah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Az-Zalzalah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-‘Adiyat'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Qari’ah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'At-Takatsur'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-‘Asr'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Humazah'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Fil'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Quraisy'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Ma’un'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Kausar'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Kafirun'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'An-Nasr'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Lahab'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Ikhlas'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'Al-Falaq'],
            ['mapel_id' => '1', 'ujian_id' => '8', 'kategori' => 'Surah 30', 'nama_item' => 'An-Nas'],

            // ============================
            // PRAKTEK SHOLAT (83)
            // ============================
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Niat Shalat'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Takbiratul Ihram'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Bacaan Iftitah'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Surah Al-Fatihah'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Surah Pendek'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Rukuk'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'I’tidal'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Sujud'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Duduk di antara dua sujud'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Tasyahud'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Sholawat'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Doa setelah tasyahud'],
            ['mapel_id' => '1', 'ujian_id' => '4', 'kategori' => 'praktek sholat', 'nama_item' => 'Salam'],            

            // ============================
            // PRAKTEK WUDHU (80)
            // ============================
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Niat'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Membasuh tangan'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Berkumur'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Mencuci hidung'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Mencuci wajah'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Mecuci lengan'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Mengusap kepala'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Mengusap Telinga'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Mencuci Kaki'],
            ['mapel_id' => '1', 'ujian_id' => '5', 'kategori' => 'praktek wudhu', 'nama_item' => 'Berurutan'],

            ['mapel_id' => '2', 'ujian_id' => '10', 'kategori' => 'prakarya', 'nama_item' => 'Membuat Prakarya'],

            

            
        ];

        DB::table('ujian_item')->insert($items);
    
    }
}

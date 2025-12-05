<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [

            // 5 Bahrain
            ['nis' => '21221003', 'nisn' => '3143732666', 'nama_lengkap' => 'ADIBA SHAKIRA ATMARINI', 'nama_panggilan' => 'Adiba', 'gender' => 'P'],
            ['nis' => '21221005', 'nisn' => '0154828546', 'nama_lengkap' => 'AFIQAH ZAHRA SALSABILA', 'nama_panggilan' => 'Afiqah', 'gender' => 'P'],
            ['nis' => '21221010', 'nisn' => '3144562762', 'nama_lengkap' => 'ANINDITA MAHARANI SUTIAWAN', 'nama_panggilan' => 'Anin', 'gender' => 'P'],
            ['nis' => '21221011', 'nisn' => '3149856800', 'nama_lengkap' => 'ARRA EKA OCTAVIANI', 'nama_panggilan' => 'Arra', 'gender' => 'P'],
            ['nis' => '21221014', 'nisn' => '3142873321', 'nama_lengkap' => 'AXELIA ARSHYFA RAYNELLE GIFARA', 'nama_panggilan' => 'Axelia', 'gender' => 'P'],
            ['nis' => '21221019', 'nisn' => '3149659629', 'nama_lengkap' => 'FARRAS AFIYAH NAILA ILHAM', 'nama_panggilan' => 'Farras', 'gender' => 'P'],
            ['nis' => '21221020', 'nisn' => '3140549834', 'nama_lengkap' => 'FITRI SALASATUN', 'nama_panggilan' => 'Fitri', 'gender' => 'P'],
            ['nis' => '21221021', 'nisn' => '3149263783', 'nama_lengkap' => 'HADIBAH SALSABILA SIREGAR', 'nama_panggilan' => 'Hadibah', 'gender' => 'P'],
            ['nis' => '21221028', 'nisn' => '3150493276', 'nama_lengkap' => 'KIANDRA AQILA ZAHRA', 'nama_panggilan' => 'Kiandra', 'gender' => 'P'],
            ['nis' => '21221029', 'nisn' => '3154050691', 'nama_lengkap' => 'MAFAZA ALEISHA FAIRUZZAKI', 'nama_panggilan' => 'Mafaza', 'gender' => 'P'],
            ['nis' => '21221030', 'nisn' => '0144330161', 'nama_lengkap' => 'MIKAYLA JASMIN FADLYSAH', 'nama_panggilan' => 'Mikayla', 'gender' => 'P'],
            ['nis' => '21221038', 'nisn' => '3152380188', 'nama_lengkap' => 'NADHIFA AZZAHRA FITRIA', 'nama_panggilan' => 'Nadhifa', 'gender' => 'P'],
            ['nis' => '21221039', 'nisn' => '3158720394', 'nama_lengkap' => 'NAJWA KHAIRA BILQIS', 'nama_panggilan' => 'Najwa', 'gender' => 'P'],
            ['nis' => '21221040', 'nisn' => '3143568361', 'nama_lengkap' => 'NAYLA ZUMIA SYAFAKILLAH', 'nama_panggilan' => 'Nayla', 'gender' => 'P'],
            ['nis' => '21221041', 'nisn' => '3146771448', 'nama_lengkap' => 'QORINA ADZRA KAMILA', 'nama_panggilan' => 'Qorina', 'gender' => 'P'],
            ['nis' => '21221043', 'nisn' => '3141507428', 'nama_lengkap' => 'RAIHANA AMIRAH KALTSUM INDIRA', 'nama_panggilan' => 'Hana', 'gender' => 'P'],
            ['nis' => '21221044', 'nisn' => '3150065402', 'nama_lengkap' => 'RHORO AYU CAHAYA KHUMAIRA', 'nama_panggilan' => 'Rhoro', 'gender' => 'P'],
            ['nis' => '21221046', 'nisn' => '3148729750', 'nama_lengkap' => 'SALSABILA NADHIFA KRISTANTO', 'nama_panggilan' => 'Salsa', 'gender' => 'P'],
            ['nis' => '21221047', 'nisn' => '3147691401', 'nama_lengkap' => 'SHAFFIYAH FATHIMAH AZ ZAHRA', 'nama_panggilan' => 'Fathimah', 'gender' => 'P'],
            ['nis' => '2425.4.061', 'nisn' => '0155727179', 'nama_lengkap' => 'SHAFIRA AYUNDA', 'nama_panggilan' => 'Fira', 'gender' => 'P'],
            ['nis' => '21221048', 'nisn' => '0145690921', 'nama_lengkap' => 'SHIDQIA IZZA AZZAHRA', 'nama_panggilan' => 'Qia', 'gender' => 'P'],
            ['nis' => '22232059', 'nisn' => '3147803154', 'nama_lengkap' => 'SITI AIDILA HASIDIN', 'nama_panggilan' => 'Dila', 'gender' => 'P'],
            ['nis' => '21221049', 'nisn' => '3149042318', 'nama_lengkap' => 'SYALWA FITRI IZZATUNNISA', 'nama_panggilan' => 'Syalwa', 'gender' => 'P'],
            ['nis' => '21221050', 'nisn' => '3152997735', 'nama_lengkap' => 'TIFANY CAHYA QUEEN FORIYANI', 'nama_panggilan' => 'Zakiya', 'gender' => 'P'],
            ['nis' => '21221053', 'nisn' => '3144184911', 'nama_lengkap' => 'ZAKIYA AZAHRA RAMADHANI', 'nama_panggilan' => 'Zakiya', 'gender' => 'P'],
            ['nis' => '22231060', 'nisn' => '3152583699', 'nama_lengkap' => "ZARQA SAMA'IR RAHMAH", 'nama_panggilan' => 'Rahma', 'gender' => 'P'],
            ['nis' => '21221054', 'nisn' => '3154754223', 'nama_lengkap' => 'ZUKHRUFA SYAHBI KHAIRANI', 'nama_panggilan' => 'Ufa', 'gender' => 'P'],

            // 5 oman
            ['nis' => '21221002', 'nisn' => '0144177688', 'nama_lengkap' => 'ADAM FAIZ AL ARKHAN LAFI', 'nama_panggilan' => 'Faiz', 'gender' => 'L'],
            ['nis' => '21221004', 'nisn' => '3152124011', 'nama_lengkap' => 'ADITIYA MAHYA TRI MARDANI', 'nama_panggilan' => 'Adit', 'gender' => 'L'],
            ['nis' => '21221006', 'nisn' => '3150403227', 'nama_lengkap' => 'AHMAD AFIF AL BAIHAQI', 'nama_panggilan' => 'Afif', 'gender' => 'L'],
            ['nis' => '21221007', 'nisn' => '3148544809', 'nama_lengkap' => 'AL HAFIZH IBNU MUSTOFA', 'nama_panggilan' => 'Hafizh', 'gender' => 'L'],
            ['nis' => '21221008', 'nisn' => '3146545504', 'nama_lengkap' => 'ALDHAN FATHURAHMAN', 'nama_panggilan' => 'Aldhan', 'gender' => 'L'],
            ['nis' => '21221009', 'nisn' => '3159830211', 'nama_lengkap' => 'ALKAHFI ZURRY IBRAHIM', 'nama_panggilan' => 'Zurry', 'gender' => 'L'],
            ['nis' => '21221012', 'nisn' => '3155206826', 'nama_lengkap' => 'ATHA SAKHA AL ZHAFRAN', 'nama_panggilan' => 'Atha', 'gender' => 'L'],
            ['nis' => '21221013', 'nisn' => '0136932824', 'nama_lengkap' => 'ATHARIZ DIMAS SANTOSO', 'nama_panggilan' => 'Dimas', 'gender' => 'L'],
            ['nis' => '21221015', 'nisn' => '3143994865', 'nama_lengkap' => 'AZ-ZUMAR KHAIZURAN AHWAZ', 'nama_panggilan' => 'Zuran', 'gender' => 'L'],
            ['nis' => '21221022', 'nisn' => '3145540437', 'nama_lengkap' => 'HISYAM ZULFADHLI', 'nama_panggilan' => 'Hisyam', 'gender' => 'L'],
            ['nis' => '21221023', 'nisn' => '3145264294', 'nama_lengkap' => 'JAZLI HILBRAN', 'nama_panggilan' => 'Jazli', 'gender' => 'L'],
            ['nis' => '21221024', 'nisn' => '3147569832', 'nama_lengkap' => 'KAUTSAR GIBRAN ARIKA PUTRA', 'nama_panggilan' => 'Kautsar', 'gender' => 'L'],
            ['nis' => '21221026', 'nisn' => '0146724242', 'nama_lengkap' => 'KENZIE AL RAIS WARDHANA', 'nama_panggilan' => 'Kenzie', 'gender' => 'L'],
            ['nis' => '21221027', 'nisn' => '3142083950', 'nama_lengkap' => 'KENZIE FAUDZI DARMANTO', 'nama_panggilan' => 'Kenzie', 'gender' => 'L'],
            ['nis' => '21221032', 'nisn' => '3142587523', 'nama_lengkap' => 'M ZAKHWAN AIMAN HAFFIIZH', 'nama_panggilan' => 'Zakhwan', 'gender' => 'L'],
            ['nis' => '21221031', 'nisn' => '3140003362', 'nama_lengkap' => 'MUHAMAD ALFIAN', 'nama_panggilan' => 'Alfain', 'gender' => 'L'],
            ['nis' => '21221033', 'nisn' => '3143233522', 'nama_lengkap' => 'MUHAMMAD ABDUL KARIM', 'nama_panggilan' => 'Karim', 'gender' => 'L'],
            ['nis' => '21221034', 'nisn' => '0155940895', 'nama_lengkap' => 'MUHAMMAD GHAISAN FAUZI', 'nama_panggilan' => 'Ghaisan', 'gender' => 'L'],
            ['nis' => '21221035', 'nisn' => '3156510105', 'nama_lengkap' => 'MUHAMMAD HABIL AL-AYYUBI', 'nama_panggilan' => 'Habil', 'gender' => 'L'],
            ['nis' => '21221042', 'nisn' => '0146332884', 'nama_lengkap' => 'RAFANDRA DHIYA PRASETYO', 'nama_panggilan' => 'Andra', 'gender' => 'L'],
            ['nis' => '2425.4.060', 'nisn' => '3142956132', 'nama_lengkap' => 'RAFFA AHSAN ALKAUTSAR', 'nama_panggilan' => 'Raffa', 'gender' => 'L'],
            ['nis' => '22231061', 'nisn' => '3142967662', 'nama_lengkap' => 'Rajwa Alrassya Fahreza', 'nama_panggilan' => 'Rajwa', 'gender' => 'L'],
            ['nis' => '21221045', 'nisn' => '3146599948', 'nama_lengkap' => 'RIFFAT ISYARI TSAQIB', 'nama_panggilan' => 'Riffat', 'gender' => 'L'],
            ['nis' => '2425.4.062', 'nisn' => '0145800047', 'nama_lengkap' => 'TAHSIN AGHA AFKAR', 'nama_panggilan' => 'Fikri', 'gender' => 'L'],
            ['nis' => '21221052', 'nisn' => '3145323406', 'nama_lengkap' => 'ZAKI HAFIZH AL KHALIFI', 'nama_panggilan' => 'Zaki', 'gender' => 'L'],

            // 4 Tunisia
            ['nis' => '22231002', 'nisn' => '3157014750', 'nama_lengkap' => 'ABDUL RASYD ZUBAIR', 'nama_panggilan' => 'Abdul', 'gender' => 'P'],
            ['nis' => '22231004', 'nisn' => '3153838171', 'nama_lengkap' => 'ADEEVA AZZAHRA', 'nama_panggilan' => 'Adeeva', 'gender' => 'P'],
            ['nis' => '22231005', 'nisn' => '3159553518', 'nama_lengkap' => 'ADHYASTHA ALVARO', 'nama_panggilan' => 'Adhyastha', 'gender' => 'P'],
            ['nis' => '22231007', 'nisn' => '3159564044', 'nama_lengkap' => 'AHSAN AHMAD BAKHTIAR', 'nama_panggilan' => 'Ahsan', 'gender' => 'P'],
            ['nis' => '22231011', 'nisn' => '3165176263', 'nama_lengkap' => 'AISYAH AYUDIA INARA', 'nama_panggilan' => 'Aisyah', 'gender' => 'P'],
            ['nis' => '22231059', 'nisn' => '3156539866', 'nama_lengkap' => 'ALESHA INARA ANDANIS', 'nama_panggilan' => 'Alesha', 'gender' => 'P'],
            ['nis' => '22231015', 'nisn' => '3169166543', 'nama_lengkap' => 'AQILLA PUTRI RAMADHANI', 'nama_panggilan' => 'Aqilla', 'gender' => 'P'],
            ['nis' => '22231017', 'nisn' => '0164371349', 'nama_lengkap' => 'Arkeyzajuna Abdilla Setosusanto', 'nama_panggilan' => 'Arkeyzajuna', 'gender' => 'P'],
            ['nis' => '22231020', 'nisn' => '3159258935', 'nama_lengkap' => 'AYUNINDYA SASIKIRANI MEAZZA', 'nama_panggilan' => 'Ayunindya', 'gender' => 'P'],
            ['nis' => '22231022', 'nisn' => '3153963706', 'nama_lengkap' => 'BILQIS AIDA HASLIM', 'nama_panggilan' => 'Bilqis', 'gender' => 'P'],
            ['nis' => '22231024', 'nisn' => '3154778695', 'nama_lengkap' => 'HABIBIE AL GHIFFARI AHMADI', 'nama_panggilan' => 'Habibie', 'gender' => 'P'],
            ['nis' => '22231025', 'nisn' => '3164820247', 'nama_lengkap' => 'HAFIZH NIQOULHAQ RISMIAJI', 'nama_panggilan' => 'Hafizh', 'gender' => 'P'],
            ['nis' => '22231026', 'nisn' => '3160601690', 'nama_lengkap' => 'HANIF ILMANNAFIAN RISMIAJI', 'nama_panggilan' => 'Hanif', 'gender' => 'P'],
            ['nis' => '22231027', 'nisn' => '3150294532', 'nama_lengkap' => 'HUISHA HAFIYA THUFAIL ONG', 'nama_panggilan' => 'Huisha', 'gender' => 'P'],
            ['nis' => '22231031', 'nisn' => '3147927831', 'nama_lengkap' => 'KENZO YUDIZKA RAMADHAN', 'nama_panggilan' => 'Kenzo', 'gender' => 'P'],
            ['nis' => '22231034', 'nisn' => '3158008088', 'nama_lengkap' => 'KIRANA NOVI LARASATI', 'nama_panggilan' => 'Kirana', 'gender' => 'P'],
            ['nis' => '22231039', 'nisn' => '3154390479', 'nama_lengkap' => 'MIKAYLA AYESHA PUTRI RIZKY', 'nama_panggilan' => 'Mikayla', 'gender' => 'P'],
            ['nis' => '22231040', 'nisn' => '3155961866', 'nama_lengkap' => 'MUHAMMAD AL RAFAEYZA', 'nama_panggilan' => 'Rafaeyza', 'gender' => 'P'],
            ['nis' => '22231941', 'nisn' => '3159392611', 'nama_lengkap' => 'Muhammad Fahmi Khairullah', 'nama_panggilan' => 'Fahmi', 'gender' => 'P'],
            ['nis' => '22231042', 'nisn' => '3156522969', 'nama_lengkap' => 'MUHAMMAD HAMZAH', 'nama_panggilan' => 'Hamzah', 'gender' => 'P'],
            ['nis' => '22231049', 'nisn' => '3154601805', 'nama_lengkap' => 'RAHADIAN ZAMANI', 'nama_panggilan' => 'Rahadian', 'gender' => 'P'],
            ['nis' => '22231050', 'nisn' => '3150974355', 'nama_lengkap' => 'RAHARDIKA GEAN FERIANSYAH', 'nama_panggilan' => 'Rahardika', 'gender' => 'P'],
            ['nis' => '22231052', 'nisn' => '3157815710', 'nama_lengkap' => 'RASENDRIYA ANSELL SETIAWAN', 'nama_panggilan' => 'Rasendriya', 'gender' => 'P'],
            ['nis' => '22231054', 'nisn' => '3155805460', 'nama_lengkap' => 'TRESNO BANYU AJI', 'nama_panggilan' => 'Tresno', 'gender' => 'P'],
            ['nis' => '22231055', 'nisn' => '3151579385', 'nama_lengkap' => 'WARREN REYNARD SUNANTO', 'nama_panggilan' => 'Warren', 'gender' => 'P'],
            ['nis' => '22231057', 'nisn' => '0157124996', 'nama_lengkap' => 'YASMIN AZALIA HUMAIRA', 'nama_panggilan' => 'Yasmin', 'gender' => 'P'],

        ];
        
        DB::table('siswa')->insert($items);
    }
}

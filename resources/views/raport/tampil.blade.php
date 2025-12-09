{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapor ATT - ALFIAN RIZKI MUTHA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Calibri:wght@400;700&display=swap"> --}}
<x-layout>
    <style>
        @page {
            size: 21cm 33cm; /* Ukuran F4 */
            margin: 0;
        }
        
        body {
            font-family: 'Calibri', sans-serif;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            position: relative;
            
            box-sizing: border-box;
            margin-right: 2,54cm;
            margin-left: 2,54cm;

            /* stle yang mengganngu saat digabungin layout */
            /* width: 21cm;
            min-height: 33cm;
            padding: 1.5cm; */
        }
        
        .page-border {
            position: absolute;
            top: 0.5cm;
            left: 0.5cm;
            right: 0.5cm;
            bottom: 0.5cm;
            border: 2px solid #1e40af;
            pointer-events: none;
        }

        .namaSekolah{
            position: absolute;
            top: 0.5cm;
            left: 0.5cm;
            right: 0.5cm;
            bottom: 0.5cm;
        }

        /* Ukuran Kertas */
        .f4-paper {
            /* Ukuran kertas F4 */
            width: 21cm;
            min-height: 33cm;
            background: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            position: relative;
        }

        .margin-kertas{
            /* Margin 2.54cm = 1 inch seperti MS Word */
            padding: 2.54cm;    
        }

        .data-raport{
            padding-left: 0.5cm;
        }
        
        .header-section {
            padding-bottom: 0.5rem;
            margin-bottom: 0;
        }
        
        .table-header {
            background-color: #00B050;
            font-weight: bold;
            text-align: center;
        }
        
        .table-cell {
            border: 1px solid black;
            padding: 0.4rem;
            vertical-align: middle;
        }
        
        .signature-line {
            border-bottom: 1px solid black;
            width: 100%;
            display: inline-block;
            margin-top: 2rem;
        }
        
        .footer-section {
            position: absolute;
            bottom: 1cm;
            left: 1.5cm;
            right: 1.5cm;
        }
        
        @media print {
            body {
                width: 21cm;
                height: 33cm;
                margin: 0;
                padding: 1.5cm;
                box-shadow: none;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                .page-border {
                    display: none !important;
                }
            }
            
            .no-print {
                display: none !important;
                
            }
        }
    </style>
    
</head>
<body>
    <div class="f4-paper">
        <div class="namaSekolah" style="width: 80%; margin: auto; ">
            <h1 style="font-size:16pt;margin-bottom:-6px" class="text-black text-center">LAPORAN ATT</h1>
            <h1 style="font-size:16pt; margin-bottom:-6px" class="text-2xl text-black text-center">PENILAIAN SUMATIF AKHIR SEMESTER</h1>
            <h1 style="font-size:16pt; border-bottom: 2px solid black;" class="text-2xl text-black text-center">SD ISLAM TERPADU AL AKMAL</h1>
        </div>
            <!-- kontainer utama kertas f4 -->
        <div class="margin-kertas">
            <!-- Border untuk halaman -->
            <div class="page-border"></div>
            
            <!-- Header Rapor -->
            <div class="header-section">
                
                
                <div class="flex justify-between items-start mb-2">   
                </div>
                
                <div class="grid grid-cols-2 gap-4 mt-4" style="display:flex; justify-content: space-between; padding-top:10px;">
                    <div class="text-left" >
                        <p>Nama Siswa</p>
                        <p>Kelas</p>
                    </div>
                    <div>
                        <p>: {{ $siswa->nama_lengkap }}</p>
                        <p>: {{ $kelas->rombel }}  {{ $kelas->nama_kelas }}</p>
                    </div>
                    <div></div>
                    <div></div>
                    <div class="text-left">
                        <p><span >Tahun Pelajaran</span></p>
                        <p><span ></span>Semester</p>
                    </div>
                    <div>
                        <p>: {{ $tahun->tahun_mulai }}/{{ $tahun->tahun_selesai }}</p>
                        <p>: {{ $semester->nama_semester }}</p>  
                    </div>
                    <div></div>
                </div>
            </div>
            
            <div class="data-raport">
            <!-- Bagian A: Agama -->
                <div class="mb-0">
                    <h2 style="padding-left: 1cm" class="text-lg font-bold text-black mb-3">A. Agama</h2>
                    
                    <table class="w-full border-collapse mb-4">
                        <thead>
                            <tr>
                                <th rowspan="2" class="table-cell table-header" style="width: 1cm;  padding:1px;">No</th>
                                <th rowspan="2" class="table-cell table-header" style="width: 55%;  padding:1px;">Mata Pelajaran</th>
                                <th class="table-cell table-header" colspan="2" style="width: 5,3cm;  padding:1px;">Nilai Hasil Belajar</th>
                            </tr>
                            <tr>
                                <th style="width:2,4cm; padding:1px" class="table-cell table-header">Nilai</th>
                                <th style="width:2,9cm; padding:1px" class="table-cell table-header">Predikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-cell text-center">1</td>
                                <td class="table-cell">Adab di Dalam Halaqah</td>
                                <td class="table-cell text-center">{{ $adab }}</td>
                                <td class="table-cell text-center font-bold">{{ $adabPredikat }}</td>
                            </tr>
                            <tr>
                                <td class="table-cell text-center">2</td>
                                <td class="table-cell">Bacaan IQRO USTMANI jilid 5 Halaman 12</td>
                                <td class="table-cell text-center"></td>
                                <td class="table-cell text-center font-bold">B</td>
                            </tr>
                            <tr>
                                <td class="table-cell text-center">3</td>
                                <td class="table-cell">Bacaan Al-Qur'an s/d Juz 30 Al-Baqarah: 1-10</td>
                                <td class="table-cell text-center"></td>
                                <td class="table-cell text-center font-bold">A</td>
                            </tr>
                            <tr>
                                <td class="table-cell text-center">4</td>
                                <td class="table-cell">Hafalan Bacaan Shalat</td>
                                <td class="table-cell text-center"></td>
                                <td class="table-cell text-center font-bold">B</td>
                            </tr>
                            <tr>
                                <td class="table-cell text-center">5</td>
                                <td class="table-cell">Praktek/ Amalan Shalat</td>
                                <td class="table-cell text-center"></td>
                                <td class="table-cell text-center font-bold">B</td>
                            </tr>
                            <tr>
                                <td class="table-cell text-center">6</td>
                                <td class="table-cell">Do'a dan Adab Harian</td>
                                <td class="table-cell text-center">{{ $doa }}</td>
                                <td class="table-cell text-center font-bold">{{$doaPredikat }}</td>
                            </tr>
                            <tr>
                                <td class="table-cell text-center">7</td>
                                <td class="table-cell">Hadis</td>
                                <td class="table-cell text-center">{{ $hadis }}</td>
                                <td class="table-cell text-center font-bold">{{ $hadisPredikat }}</td>
                            </tr>
                            <tr>
                                <td class="table-cell text-center">8</td>
                                <td class="table-cell">Tahsinul Kitabah</td>
                                <td class="table-cell text-center">{{ $kitabah }}</td>
                                <td class="table-cell text-center font-bold">{{ $kitabahPredikat }}</td>
                            </tr>
                            <tr>
                                <td class="table-cell text-center">9</td>
                                <td class="table-cell">Pencapaian Target Hafalan</td>
                                <td class="table-cell text-center"></td>
                                <td class="table-cell text-center font-bold">A</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Bagian B: Tahfidz -->
                <div class="mb-0">
                    <h2 style="padding-left: 1cm" class="text-lg font-bold text-black mb-0">B. Tahfidz</h2>
                    
                    <table class="w-full border-collapse mb-4">
                        <thead>
                            <tr>
                                <th rowspan="2" class="table-cell table-header" style="width: 1cm; padding:1px;">No.</th>
                                <th class="table-cell table-header" colspan="2" style="width: 5cm; padding:1px;">Nama Surah</th>
                                <th colspan="2" class="table-cell table-header" style="width: 8cm; padding:1px;">Nilai Hasil Belajar</th>
                            </tr>
                            <tr>
                                <th class="table-cell table-header" colspan="2" style="width: 1cm; padding:1px;">Hafalan Tahfidz</th>
                                <th class="table-cell table-header"style="width: 4cm; padding:1px;">Nilai</th>
                                <th class="table-cell table-header"style="width: 4cm; padding:1px;">Predikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #FFFF00;" style="padding:0.2rem;">
                                <td class="table-cell text-center" style="padding:0.2rem;">1</td>
                                <td class="table-cell" colspan="2" style="padding:0.2rem;">Al-Qoriah - An-Naba</td>
                                <td class="table-cell text-center" style="padding:0.2rem;">{{ $surah28 }}</td>
                                <td class="table-cell text-center" style="padding:0.2rem;">{{ $surah28Predikat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Catatan dan Saran untuk Orang Tua -->
                <table class="w-full border-collapse mb-4">
                    <thead>
                        <tr>
                            <th class="table-cell">CATATAN DAN SARAN UNTUK ORANG TUA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-cell"><p class="mb-3">Alhamdulillaah Ananda <span class="font-bold">{{ $siswa->nama_panggilan }}</span> selalu bersemangat dalam menghafal, Ananda sudah terbiasa menyetorkan hafalan. Mohon bimbingan Ayah dan Bunda dirumah untuk selalu mengingatkan murojaah dan hafalan di rumah. Semoga Ananda <span class="font-bold">{{ $siswa->nama_panggilan }}</span> senantiasa istiqomah murojaah menjaga hafalannya Amiin.</p></td>
                        </tr>
                    </tbody>
                </table>
                        

                <!-- Keterangan Predikat -->
                <div class="mb-0 border p-2 rounded " style="border-color: #70AD47; width: 7cm;">
                            <p class="font-bold">Keterangan Predikat:</p>
                            <ul class="list-disc pl-5">
                                <li><span class="font-bold">A</span> = 85 - 95</li>
                                <li><span class="font-bold">B</span> = 75 - 84</li>
                                <li><span class="font-bold">C</span> = 65 - 74</li>
                            </ul>
                </div>                                
            </div>
            <!-- Footer dengan Tanda Tangan -->
                <div class="footer-section">
                    
                    <div class="flex justify-between items-end" style="padding-bottom: 1.5cm;">
                        <div class="text-center" style="width: 35%">
                            <p>Orangtua/Wali Siswa</p>
                        </div>
                        <div class="text-center" style="width: 40%;">
                            <p>Tangerang, 20 Desember 2025</p>
                            <p>Musyrif</p>
                        </div>
                        
                    </div>

                    <div class="flex justify-between items-end">
                        <div class="text-center" style="width: 40%">
                            <div class="border border-black" style="width: 80%"></div>
                            
                        </div>
                        
                        <div class="text-center" style="width: 40%; display: flex; flex-direction: column; ">
                            <div ><p></p></div>
                            <div></div>
                            <div><p>Muhatir Muhamad, S.Pd.I</p></div>
                            <div class="border border-black"></div>
                            
                        </div>
                    </div>
                    
                    <!-- Tombol untuk Print (hanya ditampilkan di browser) -->
                    <div class="no-print mt-0 text-center justify-between" style="display: flex; align-items: baseline;">
                        <div style="width: auto">
                            <!-- Tombol untuk kembali (hanya ditampilkan di browser) -->
                            <a href="{{ route('raport.index') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow">
                            <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                            Kembali
                            </a>
                        </div>
                        <div >
                            <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow">
                            Cetak Rapor
                        </button>
                        <p class="text-xs text-gray-500 mt-2">Ukuran kertas: F4 (21cm x 33cm)</p>
                        </div>
                        <div style="width: 20%;"></div>
                        
                    </div>

                    
                </div>
        </div>
    </div>
</x-layout>
{{-- </body>
</html> --}}
<x-layout>
    <div class="max-w-4xl mx-auto bg-white p-10 shadow-lg border border-gray-300">

        <!-- HEADER -->
        <h1 class="text-center text-xl font-bold uppercase">
            LAPORAN ATT<br>
            PENILAIAN SUMATIF AKHIR SEMESTER
        </h1>

        <h2 class="text-center text-lg font-semibold mt-1">
            SD ISLAM TERPADU AL AKMAL
        </h2>

        <!-- BIODATA -->
        <div class="mt-8 text-sm">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p>Nama Siswa : <span class="font-semibold">{{ $siswa->nama_lengkap }}</span></p>
                    <p>Kelas : <span class="font-semibold">{{ $kelas->nama_kelas }}</span></p>
                </div>
                <div>
                    <p>Tahun Pelajaran : <span class="font-semibold">{{ $tahunAjaran }}</span></p>
                    <p>Semester : <span class="font-semibold">{{ $semester }}</span></p>
                </div>
            </div>
        </div>

        <!-- TABEL AGAMA -->
        <h3 class="mt-8 font-bold uppercase">Agama</h3>
        <table class="w-full mt-3 border border-black text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-black p-1 w-10">No</th>
                    <th class="border border-black p-1">Mata Pelajaran</th>
                    <th class="border border-black p-1 w-32">Nilai</th>
                    <th class="border border-black p-1 w-32">Predikat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai_agama as $index => $item)
                    <tr>
                        <td class="border border-black p-1 text-center">{{ $index+1 }}</td>
                        <td class="border border-black p-1 text-center">{{ $item->mapel->nama_pelajaran }}</td>
                        <td class="border border-black p-1 text-center">{{ $item->nilai }}</td>
                        <td class="border border-black p-1 text-center">{{ $item->predikat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- TABEL TAHFIDZ -->
        <h3 class="mt-8 font-bold uppercase">Tahfidz</h3>
        <table class="w-full mt-3 border border-black text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-black p-1 w-10">No</th>
                    <th class="border border-black p-1">Nama Surah</th>
                    <th class="border border-black p-1 w-32">Nilai</th>
                    <th class="border border-black p-1 w-32">Predikat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai_tahfidz as $B)
                    @foreach ($B as $index => $item)
                    <tr>
                        <td class="border border-black p-1 text-center">{{ $index + 1 }}</td>
                        <td class="border border-black p-1">{{ $item->nama_item }}</td>
                        <td class="border border-black p-1 text-center">{{ $item->nilai }}</td>
                        <td class="border border-black p-1 text-center">{{ $item->predikat }}</td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <!-- CATATAN -->
        <div class="mt-8">
            <h3 class="font-bold">CATATAN DAN SARAN UNTUK ORANG TUA</h3>
            <p class="text-sm mt-2">
                Alhamdulillaah Ananda {{ $siswa->nama }} selalu bersemangat dalam menghafal,
                Ananda sudah terbiasa menyetorkan hafalan. Mohon bimbingan Ayah dan Bunda
                untuk selalu mengingatkan murojaah dan hafalan di rumah. Semoga Ananda
                senantiasa istiqomah menjaga hafalannya. Aamiin.
            </p>
        </div>

        <!-- KETERANGAN PRE DI KAT -->
        <div class="mt-8 text-sm">
            <h3 class="font-bold">Keterangan Predikat:</h3>
            <p>A = 85 - 95</p>
            <p>B = 75 - 84</p>
            <p>C = 65 - 74</p>
        </div>

        <!-- TANDA TANGAN -->
        <div class="mt-10 grid grid-cols-2 text-sm">
            <div>
                <p>Orangtua/Wali</p>
                <br><br><br>
                <p>________________________</p>
            </div>
            <div class="text-right">
                <p>Tangerang, 20 Desember 2025</p>
                <p>Musyrif</p>
                <br><br><br>
                <p><strong>Muhatir Muhamad, S.Pd.I</strong></p>
            </div>
        </div>

    </div>
</x-layout>

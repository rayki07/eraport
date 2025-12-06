<x-layout>
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
        <!-- Header Konten -->
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center space-x-2 text-gray-700">
                <i data-lucide="users-2" class="w-6 h-6"></i>
                <h2 class="text-xl font-semibold">Daftar Ujian</h2>
            </div>
            <a href="/guru/create" class="flex items-center bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Tambah Ujian
            </a>               
        </div>

        <!-- Kontrol Tabel (Search dan Entries) -->

<div class="container">
    <h3>Input Nilai Ujian</h3>

    <div class="card">
        <div class="card-body">
            <h5>Informasi</h5>
            <p>
                <strong>Kelas:</strong> {{ $kelas }} <br>
                <strong>Ujian:</strong> {{ $ujian }} <br>
                <strong>Semester:</strong> {{ $semester->nama_semester }} <br>
                <strong>Tahun Ajaran:</strong> {{ $tahun->tahun_mulai }}/{{ $tahun->tahun_akhir }}
            </p>
        </div>
    </div>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf
        
        {{-- Kirim hidden --}}
        <input type="hidden" name="kelas_id" value="{{ $kelas }}">
        <input type="hidden" name="ujian_id" value="{{ $ujian }}">
        <input type="hidden" name="semester_id" value="{{ $semester->id }}">
        <input type="hidden" name="tahun_ajaran_id" value="{{ $tahun->id }}">

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Siswa</th>

                        @foreach ($items as $item)
                            <th>{{ $item->nama_item }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($siswa as $siswa)
                        <tr>
                            <td>{{ $siswa->nama }}</td>

                            @foreach ($ujianItems as $item)
                                @php
                                    $existing = $existingNilai
                                        ->where('siswa_id', $siswa->id)
                                        ->where('ujian_item_id', $item->id)
                                        ->first();
                                @endphp

                                <td>
                                    <input
                                        type="number"
                                        name="nilai[{{ $siswa->id }}][{{ $item->id }}]"
                                        class="form-control"
                                        min="0"
                                        max="100"
                                        value="{{ $existing->nilai ?? '' }}"
                                        placeholder="0-100"
                                    >
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button class="btn btn-primary mt-3">
            Simpan Nilai
        </button>
    </form>
</div>

<!-- selesai Data -->
    </div>                
</x-layout>
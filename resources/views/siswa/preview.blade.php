
<x-layout>
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
        <!-- Header Konten -->
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center space-x-2 text-gray-700">
                <i data-lucide="users-2" class="w-6 h-6"></i>
                <h2 class="text-xl font-semibold">Tambah Siswa</h2>
            </div>
            <a class="flex items-center bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Tambah Siswa
            </a>
                

        </div>

        <!-- Taruh data disini -->
        <div class="p-6">

    <h2 class="text-xl font-bold mb-3">Preview Data Siswa</h2>

    <table class="w-full border mb-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">NIS</th>
                <th class="border p-2">NISN</th>
                <th class="border p-2">Nama Siswa</th>
                <th class="border p-2">Nama Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td class="border p-2">{{ $row[0][1] }}</td>
{{--                     <td class="border p-2">{{ $row[1][1] }}</td>
                    <td class="border p-2">{{ $row[1][2] }}</td>
                    <td class="border p-2">{{ $row[1][3] }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('siswa.import.confirm') }}" method="POST">
        @csrf

        <input type="hidden" name="file_content" value="{{ $file }}">
        <input type="hidden" name="kelas_id" value="{{ request()->kelas_id }}">

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Setujui & Simpan
        </button>

        <a href="{{ route('siswa.import.form') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
            Batal
        </a>
    </form>

</div>
        
        
        <!-- data akhir -->    

    </div>                
</x-layout>
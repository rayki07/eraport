
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

        <h2 class="text-xl font-bold mb-3">Import Siswa</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-900 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('siswa.import.preview') }}" 
          method="POST" enctype="multipart/form-data">
        @csrf

        <label>Kelas:</label>
        <select name="kelas_id" class="border p-2 mb-3 w-64">
            @foreach($siswa as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
        </select>

        <br>

        <input type="file" name="file" class="border p-2">
        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Preview
        </button>
    </form>
</div>
        
        
    </div>                
</x-layout>
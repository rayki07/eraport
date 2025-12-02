<x-layout>
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
        <!-- Header Konten -->
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center space-x-2 text-gray-700">
                <i data-lucide="users-2" class="w-6 h-6"></i>
                <h2 class="text-xl font-semibold">Seluruh Kelas</h2>
            </div>
            <a href="{{ route('ujian.item.create') }}" class="flex items-center bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Tambah Ujian
            </a>                
        </div>

        <!-- Kontrol Tabel (Search dan Entries) -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-3 md:space-y-0">
            <div class="flex items-center space-x-2">
                <label for="show-entries" class="text-sm text-gray-600">Show</label>
                <select id="show-entries" class="border rounded-lg p-1.5 text-sm focus:ring-blue-500 focus:border-blue-500">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <span class="text-sm text-gray-600">entries</span>
            </div>
            <div class="flex items-center space-x-2 w-full md:w-auto">
                <label for="search-siswa" class="text-sm text-gray-600">Search:</label>
                <input type="text" id="search-siswa" class="border rounded-lg p-1.5 text-sm w-full md:w-64 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Siswa...">
            </div>
        </div>

        <!-- Tabel Data Siswa -->
        <div class="overflow-x-auto rounded-lg border">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">NO</th>
                        <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">Kelas</th>
                        <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">Tahun Ajaran</th>
                        <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">OPSI</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    <!-- Baris Data Siswa -->
                    @foreach ($kelas as $index => $item)         
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900 border-x text-center">{{ $index + 1 }}</td>
                        <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x text-center">{{ $item->rombel }} {{ $item->nama_kelas }}</td>
                        <th class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900 border-x text-center">{{ $item->tahunajaran->tahun_mulai ?? '- '}}/{{ $item->tahunajaran->tahun_selesai ?? ' -' }}</th>
                        <td class="px-3 py-3 whitespace-nowrap text-center text-sm font-medium">
                            <a href="{{ route('kelas.show', $item->id) }}" class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                Detail
                            </a>
                        </td>
                    </tr>
                        @endforeach
                        
                </tbody>
            </table>
        </div>
    </div>            
              {{-- {{ $grades->links() }} --}}
</x-layout>
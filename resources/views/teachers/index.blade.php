<x-layout>
    <x-slot:heading>
        Seluruh Guru
    </x-slot:heading>
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
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">NUPTK</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">NAMA</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">GENDER</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">OPSI</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            <!-- Baris Data Siswa -->
                            @foreach ($teachers as $index => $teacher)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900 border-x text-center">{{ $index +1 }}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x">{{ $teacher->nuptk }}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x">{{ $teacher->name }}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x">{{ $teacher->gender }}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-center text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                             @endforeach
                             
                        </tbody>
                    </table>
                </div>
                
              {{-- {{ $grades->links() }} --}}
</x-layout>
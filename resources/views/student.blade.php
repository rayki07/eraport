<x-layout>
    <x-slot:heading>
        Seluruh Siswaphp Kelas X IPA A
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
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-blue-600 flex items-center justify-between">
                                    <span>NISN</span>
                                    <i data-lucide="chevrons-up-down" class="w-3 h-3 ml-1"></i>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-blue-600 flex items-center justify-between">
                                    <span>NAMA</span>
                                    <i data-lucide="chevrons-up-down" class="w-3 h-3 ml-1"></i>
                                </th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-blue-600 flex items-center justify-between">
                                    <span>GENDER</span>
                                    <i data-lucide="chevrons-up-down" class="w-3 h-3 ml-1"></i>
                                </th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TTL</th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-blue-600 flex items-center justify-between">
                                    <span>OPSI</span>
                                    <i data-lucide="chevrons-up-down" class="w-3 h-3 ml-1"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Baris Data Siswa -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">62346434</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Alvaro Morata</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 6 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                             <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">252532535</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Lionel Messi Hahahaha</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 6 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                             <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">792070952</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">M. Ronaldo</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 2 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">7217343</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Mesut Ozil Arsenal</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 4 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">5</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">7097409214</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Michael Essien Woi</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 3 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">6</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">121313313</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Muhammad Nur Hidayat</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 1 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">7</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">463263464</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Muhammad Rizky Ridho</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 9 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <!-- Tambahkan baris data lainnya di sini -->
                        </tbody>
                    </table>
                </div>
                <x-pagination />
</x-layout>
@php
    // Fungsi helper sederhana untuk membuat string menjadi aman sebagai kunci (slug)
    function clean_key($string) {
        $string = strtolower($string);
        // Hapus tanda apostrof/kutip tunggal, lalu ganti spasi dan karakter non-alphanumerik lainnya dengan underscore
        $string = str_replace("'", "", $string);
        $string = preg_replace('/[^a-z0-9]+/', '_', $string);
        $string = trim($string, '_');
        return $string;
    }
@endphp

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


        <!-- Masukkan Data) -->
<div class="overflow-x-auto rounded-lg border">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">NO</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">NISN</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">NISN</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">NAMA</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">GENDER</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">KELAS</th>
                                <th class="px-3 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-x">OPSI</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            <!-- Baris Data Siswa -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900 border-x text-center">1</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x">{{ $siswa->nis }}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x">{{ $siswa->nisn }}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x">{{ $siswa->nama }}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x">{{ $siswa->gender }}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-900 border-x">{{-- {{ $student->grades->first()->grade }} {{ $student->grades->first()->grade_name }} --}}</td>
                                <td class="px-3 py-3 whitespace-nowrap text-center text-sm font-medium">
                                    <a href="/siswa/{{ $siswa->id }}/edit" class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Edit Siswa
                                    </a>
                                </td>
                            </tr>
                             
                        </tbody>
                    </table>
                </div>


        {{-- Data Selesai --}}

    </div>
                
</x-layout>
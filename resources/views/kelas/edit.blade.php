
<x-layout>
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
        <!-- Header Konten -->
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center space-x-2 text-gray-700">
                <i data-lucide="users-2" class="w-6 h-6"></i>
                <h2 class="text-xl font-semibold">Edit Kelas</h2>
            </div>
            <a class="flex items-center bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Tambah Kelas
            </a>
                

        </div>
        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                {{-- Rombel --}}
                <div>
                    <label for="rombel" class="block text-sm font-medium text-gray-700 mb-1">Rombel</label>
                    <select name="rombel" id="rombel" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                        <option value="">-- Pilih Rombel --</option>
                        <option value="1" @if(old('rombel', $kelas->rombel) == '1') selected @endif>1</option>
                        <option value="2" @if(old('rombel', $kelas->rombel) == '2') selected @endif>2</option>
                        <option value="3" @if(old('rombel', $kelas->rombel) == '3') selected @endif>3</option>
                        <option value="4" @if(old('rombel', $kelas->rombel) == '4') selected @endif>4</option>
                        <option value="5" @if(old('rombel', $kelas->rombel) == '5') selected @endif>5</option>
                        <option value="6" @if(old('rombel', $kelas->rombel) == '6') selected @endif>6</option>
                    </select>
                    @error('rombel') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Nama Kelas) --}}
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
                    <input type="text" name="nama" id="nama" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: Tunisia" value="{{ old('nama', $kelas->nama) }}">
                    @error('nama') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Tahun Ajaran) --}}
                <div>
                    <label for="tahun_ajaran_id" class="block text-sm font-medium text-gray-700 mb-1">Tahun Ajaran</label>
                    <select name="tahun_ajaran_id" id="tahun_ajaran_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                        @foreach ($tahunajaran as $item)
                            <option value="{{ $item->id }}"
                                {{-- @if (old('tahun_ajaran_id', $kelas->tahun_ajaran_id) == $item->id) selected   
                                @endif --}}>
                            {{ $item->tahun_mulai }}/{{ $item->tahun_selesai }}</option>
                            {{-- <option value="{{ $kelas->tahunajaran->tahun_mulai }}">{{ $kelas->tahunajaran->tahun_mulai }}</option> --}}
                            {{-- <option value="{{ $item->tahun_mulai }}" @if(old('rombel', $kelas->rombel) == '6') selected @endif>6</option> --}}
                        @endforeach
                    </select>
                    @error('tahun_ajaran_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                
                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4 pt-4 border-t mt-6">
                    <a href="{{ route('kelas.show', $kelas->id) }} " class="inline-flex items-center py-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors shadow-md">
                        <i data-lucide="x" class="w-4 h-4 mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center py-2 px-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors shadow-md">
                        <i data-lucide="check" class="w-4 h-4 mr-2"></i>
                        Simpan Kelas
                    </button>
                </div>
            </form>
        
    </div>                
</x-layout>
<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700">{{ $label }}</label>
    
    <input 
        type="{{ $type }}" 
        id="{{ $name }}" 
        name="{{ $name }}"
        {{-- Menggunakan $attributes->merge() untuk menambahkan kelas default Tailwind --}}
        {{ $attributes->merge(['class' => 'border border-gray-300 p-2 rounded w-full']) }}
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        maxlength="{{ $maxLength ?? '' }}"
    >

    {{-- Tempat untuk error PHP (dari Laravel validation saat submit) --}}
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    {{-- Tempat untuk error JavaScript (validasi instan) --}}
    <p id="{{ $name }}-error" class="text-red-500 text-sm mt-1" style="display: none;"></p>
</div>



{{-- script error  --}}
<script>
    // 1. Dapatkan elemen input dan error message
    const inputNamaKelas = document.getElementById('nama_kelas');
    const errorNamaKelas = document.getElementById('nama_kelas-error');

    // 2. Tambahkan Event Listener untuk 'input' atau 'blur'
    // 'blur' terjadi saat user KLIK KELUAR dari input field
    inputNamaKelas.addEventListener('blur', function() {
        validateNamaKelas();
    });

    // 'input' terjadi setiap kali user mengetik
    inputNamaKelas.addEventListener('input', function() {
        validateNamaKelas();
    });

    // 3. Fungsi Validasi Sederhana di Sisi Klien
    function validateNamaKelas() {
        const value = inputNamaKelas.value;
        const maxLength = 7;

        if (value.length > (maxLength)) {
            // Jika validasi gagal, tampilkan pesan error
            errorNamaKelas.textContent = 'Nama kelas tidak boleh lebih dari 15 karakter.';
            errorNamaKelas.style.display = 'block';
            inputNamaKelas.classList.add('border-red-500'); // Tambah border merah (Tailwind CSS)
        } else {
            // Jika validasi sukses, sembunyikan pesan error
            errorNamaKelas.textContent = '';
            errorNamaKelas.style.display = 'none';
            inputNamaKelas.classList.remove('border-red-500');
        }
    }
</script>
<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700">{{ $label }}</label>
    
    <input 
        type="{{ $type }}" 
        id="{{ $name }}" 
        name="{{ $name }}"
        {{-- Menggunakan $attributes->merge() untuk menambahkan kelas default Tailwind --}}
        {{ $attributes->merge(['class' => 'border border-gray-300 p-2 rounded w-full']) }}
        {{-- value="{{ old($name, $value) }}" --}}
        {{ $required ? 'required' : '' }}
        maxlength="{{ $maxLength ?? '' }}"
        min="{{ $min }}"
        max="{{ $max }}"
    >

    {{-- Tempat untuk error PHP (dari Laravel validation saat submit) --}}
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    {{-- Tempat untuk error JavaScript (validasi instan) --}}
    <p id="{{ $name }}-error" class="text-red-500 text-sm mt-1" style="display: none;"></p>
    <p id="{{ $name }}--error" class="text-red-500 text-sm mt-1" style="display: none;"></p>

</div>


<!-- script error -->
{{-- <script>
    // 1. Dapatkan elemen input dan error message

    const inputNamaKelas = document.getElementById('{{ $name }}');
    const errorNamaKelas = document.getElementById('{{ $name }}-error');

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
        const maxLength = 10;

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

    
</script> --}}


<script>
    const inputElement = document.getElementById('{{ $min }}');
    const inputElemenmax = document.getElementById('{{ $max }}');
    const errorElement = document.getElementById('{{ $name }}--error');
    // Ambil nilai min dan max dari atribut HTML
    

     // Tambahkan event listeners
    inputElement.addEventListener('blur', function() {
        validateRange();
    });
    inputElement.addEventListener('input', function(){
    validateRange();
    });

    const minValue = 75;
        const maxValue = 95;

    function validateRange() {
        
        const value = inputElement.value;
        const maxValue = 5;

        /* if (value.min < (minValue) || value.max > (maxValue)) */
        if (value < maxValue || value >maxValue) {
            // Jika validasi gagal
            errorElement.textContent = 'Nilai harus antara ${minValue} dan ${maxValue}.';
            errorElement.style.display = 'block';
            inputElement.classList.add('border-red-500');
        } else {
            // Jika validasi sukses
            errorElement.textContent = '';
            errorElement.style.display = 'none';
            inputElement.classList.remove('border-red-500');
        }
             // Tambahkan event listeners
    inputElement.addEventListener('blur', validateRange);
    inputElement.addEventListener('input', validateRange);
    }

   
</script>


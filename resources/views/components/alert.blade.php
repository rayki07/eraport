{{-- @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
        {{ session('error') }}
    </div>
@endif --}}

{{-- <!-- Tombol X pakai html dan CSS -->
@if(session('success'))
    <div id="alert-success" class="flex items-center justify-between bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
        <button onclick="document.getElementById('alert-success').style.display='none'" class="text-green-700 hover:text-green-900 focus:outline-none">
            <!-- Ini adalah ikon 'X' sederhana -->>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="www.w3.org"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
@endif

@if(session('error'))
    <div id="alert-error" class="flex items-center justify-between bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
        {{ session('error') }}
        <button onclick="document.getElementById('alert-error').style.display='none'" class="text-red-700 hover:text-red-900 focus:outline-none">
             <!-- Ini adalah ikon 'X' sederhana -->
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="www.w3.org"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>  
@endif --}}

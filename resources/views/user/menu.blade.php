@extends('layouts.app')

@section('content')
<section class="relative h-[60vh] min-h-[400px] bg-cover bg-center bg-no-repeat flex items-center justify-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/Makanan.jpg') }}');">
    <div class="absolute inset-0 bg-cover bg-center opacity-10 pointer-events-none" style="background-image: url('{{ asset('images/flour-overlay.png') }}');"></div>
    <div class="relative z-10 text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white uppercase tracking-wider">
            OUR <span class="text-yellow-400">MENU</span>
        </h1>
    </div>
</section>

<section class="bg-gray-900 py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-xl md:text-2xl text-white font-medium mb-8 max-w-3xl mx-auto">
            Menu yang disediakan WeightMate rendah kalori, rendah lemak dan tinggi protein. Rasanya juga tidak hambar dan bervariasi yang bisa buat diet kamu menyenangkan!
        </h2>
        <button class="bg-yellow-400 px-8 py-3 rounded-full text-black font-bold text-lg uppercase hover:bg-yellow-300 transition duration-300 transform hover:scale-105">
            OUR MENU
        </button>
    </div>
</section>

<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($menus as $menu)
            <div class="bg-black rounded-lg overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1">
                <img src="{{ Storage::url($menu->gambar) }}" alt="{{ $menu->nama_menu }}" class="w-full h-64 object-cover">
                <div class="p-6 text-center">
                    <h2 class="text-xl font-bold text-yellow-400 mb-2">{{ $menu->nama_menu }}</h2>
                    <p class="text-gray-300 text-sm">{{ $menu->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="bg-black text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-3xl font-bold mb-6 flex items-center">
                    <span class="bg-yellow-400 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                    BENEFITS
                </h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <span class="text-yellow-400 mr-2">•</span>
                        Makanan YellowFit Kitchen mengandung 450 - 500 kalori di setiap boxnya
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-400 mr-2">•</span>
                        Setiap pelanggan yang berlangganan Yellow Fit Kitchen akan mendapatkan Garansi Uang Kembali apabila makanan dirasa nggak enak, atau jika berat badan customer tidak turun
                    </li>
                </ul>
            </div>
            <div class="bg-gray-800 rounded-lg p-8">
                <h2 class="text-3xl font-bold mb-6 flex items-center">
                    <span class="bg-yellow-400 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </span>
                    OUTLET
                </h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @foreach (['Jakarta', 'Tangerang', 'Palembang', 'Yogyakarta', 'Bogor', 'Surabaya', 'Malang', 'Solo', 'Depok', 'Bandung', 'Pekan Baru', 'Bekasi', 'Medan', 'Semarang'] as $outlet)
                    <div class="bg-gray-700 rounded p-2 text-center">{{ $outlet }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="text-center mb-8">
            <p class="mb-2">Sampai saat ini, Yellow Fit Kitchen</p>
            <p class="text-2xl">telah berhasil menurunkan berat badan <span class="text-yellow-400 font-bold">299.492</span> customer</p>
        </div>
        <div class="text-center text-xl">
            Diet Murah, Mudah, Menyenangkan. Yuk mulai diet dan jalani pola hidup sehat
        </div>
    </div>
</div>
@endsection
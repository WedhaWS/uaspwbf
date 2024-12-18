@extends('layouts.app')

@section('content')
<main class="min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/images/soup.jpg');">
    <div class="container mx-auto px-4 py-20 text-white">
        <p class="text-xl mb-2">Bingung Tiap Hari</p>
        <h1 class="text-5xl font-bold mb-8">Makan Siang Apa?</h1>
        
        <a href="#" class="inline-block px-8 py-3 border-2 border-yellow-400 text-yellow-400 text-xl rounded-full hover:bg-yellow-400 hover:text-black transition duration-300 mb-8">WEIGHTMATE AJA!</a>
        
        <ul class="space-y-4 mb-8">
            <li class="flex items-center"><span class="text-yellow-400 mr-2">✓</span> Harga cuma 50 ribuan</li>
            <li class="flex items-center"><span class="text-yellow-400 mr-2">✓</span> Dimasak Chef Ex-Hotel Bintang 5</li>
            <li class="flex items-center"><span class="text-yellow-400 mr-2">✓</span> FREE ongkir sampai depan pintu kantor atau rumah</li>
        </ul>

        <div class="mb-8">
            <h2 class="text-4xl font-bold text-yellow-400 mb-4">SOLUSI DIETMU!</h2>
            <p class="text-2xl mb-4">
                DIET & HEALTHY CATERING NO.1 DI INDONESIA<br>
                YANG PERTAMA MENGGUNAKAN <span class="text-yellow-400">NASI MERAH PULEN!</span>
            </p>

            <div class="mb-8">
                <p class="mb-2">Sudah ikut program WeightMate<br>
                tapi berat badan kamu enggak turun?<br>
                Atau makanan enggak enak?</p>
                <p class="text-xl font-bold text-yellow-400 border-b-2 border-yellow-400 inline-block">UANG KEMBALI 100%</p>
            </div>

            <div>
                <h3 class="text-2xl font-bold mb-2">OPEN ORDER BATCH 50</h3>
                <p class="mb-1">16 December 2024 - 22 December 2024</p>
                <p>Close order in: 1d 8h 20m 16s</p>
            </div>
        </div>
    </div>
</main>

<div class="container mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold text-center mb-8">OUR PRODUCT</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Weight Loss Program Card -->
        <div class="bg-black rounded-lg overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1">
            <img src="images/weightlossprogram.jpg" alt="Weight Loss Program" class="w-full h-64 object-cover">
            <div class="p-6 text-center">
                <h2 class="text-xl font-bold text-yellow-400 mb-2">Weight Loss Program</h2>
                <p class="text-white mb-4">(Program Menurunkan berat badan)</p>
                <a href="#" class="inline-block bg-yellow-400 text-black px-6 py-2 rounded-full font-bold uppercase hover:bg-yellow-500 transition duration-300">See More</a>
            </div>
        </div>

        <!-- Weight Loss Protein+ Card -->
        <div class="bg-black rounded-lg overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1">
            <img src="images/weightlossprotein.jpg" alt="Weight Loss Protein+" class="w-full h-64 object-cover">
            <div class="p-6 text-center">
                <h2 class="text-xl font-bold text-yellow-400 mb-2">Weight Loss Protein+</h2>
                <p class="text-white mb-4">(Program for Men)</p>
                <a href="#" class="inline-block bg-yellow-400 text-black px-6 py-2 rounded-full font-bold uppercase hover:bg-yellow-500 transition duration-300">See More</a>
            </div>
        </div>

        <!-- Yellow Fitness Card -->
        <div class="bg-black rounded-lg overflow-hidden shadow-lg transition duration-300 hover:-translate-y-1">
            <img src="images/fitness.jpg" alt="Yellow Fitness" class="w-full h-64 object-cover">
            <div class="p-6 text-center">
                <h2 class="text-xl font-bold text-yellow-400 mb-2">WeightMate Fitness</h2>
                <p class="text-white mb-4">E-book & Workout videos</p>
                <a href="#" class="inline-block bg-yellow-400 text-black px-6 py-2 rounded-full font-bold uppercase hover:bg-yellow-500 transition duration-300">See More</a>
            </div>
        </div>
    </div>
</div>

<section class="relative bg-cover bg-center py-16" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/images/Makanan.jpg');">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-center text-white mb-12">99% Fat Loss Guaranteed!</h1>
        
        <div class="flex flex-wrap justify-around">
            <div class="text-center mb-8 md:mb-0">
                <div class="bg-yellow-400 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
                    <img src="images/healthy-heart.png" alt="Healthy Food Icon" class="w-12 h-12">
                </div>
                <p class="text-white font-bold uppercase leading-snug max-w-[200px] mx-auto">
                    Delicious,<br>
                    Healthy,<br>
                    Good<br>
                    Quality
                </p>
            </div>

            <div class="text-center mb-8 md:mb-0">
                <div class="bg-yellow-400 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
                    <img src="images/waist.png" alt="Diet Methods Icon" class="w-12 h-12">
                </div>
                <p class="text-white font-bold uppercase leading-snug max-w-[200px] mx-auto">
                    Simple<br>
                    Diet<br>
                    Methods
                </p>
            </div>

            <div class="text-center">
                <div class="bg-yellow-400 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
                    <img src="images/affordable.png" alt="Affordable Price Icon" class="w-12 h-12">
                </div>
                <p class="text-white font-bold uppercase leading-snug max-w-[200px] mx-auto">
                    Affordable<br>
                    Price and<br>
                    Free<br>
                    Delivery
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="inline-block bg-yellow-400 px-8 py-3 rounded-full text-2xl sm:text-3xl font-bold text-black shadow-lg">
                OUR PRODUCT
            </h1>
        </div>
        @foreach($products as $product)
        <div class="bg-gray-900 rounded-3xl overflow-hidden mb-12 shadow-xl">
            <div class="p-8 sm:p-12 md:p-16 flex flex-col md:flex-row gap-8">
                <div class="md:w-5/12">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-xl shadow-lg">
                </div>
                <div class="md:w-7/12 text-white">
                    <h2 class="text-3xl sm:text-4xl font-bold text-yellow-400 mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-300 mb-6">{{ $product->description }}</p>
                    <a href="Detail/{{ $product->id }}" class="w-full bg-yellow-400 text-black font-bold py-3 px-6 rounded-full hover:bg-yellow-500 transition duration-300 transform hover:scale-105">SEE MORE</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

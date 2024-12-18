@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="inline-block bg-yellow-400 px-8 py-3 rounded-full text-2xl sm:text-3xl font-bold text-black shadow-lg">
                TESTIMONIALS
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-gray-900 rounded-3xl overflow-hidden shadow-xl">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('asset/img/avatar.jpg')}}" alt="{{ $testimonial->user_name }}" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h3 class="text-xl font-bold text-yellow-400">{{ $testimonial->user_name }}</h3>
                            <div class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $testimonial->rating)
                                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-gray-400 fill-current" viewBox="0 0 24 24">
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-4">{{ $testimonial->comment }}</p>
                    <p class="text-sm text-gray-400">{{ $testimonial->created_at->format('F j, Y') }}</p>
                </div>
            </div>
            @endforeach
        </div>


        
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="inline-block bg-yellow-400 px-8 py-3 rounded-full text-2xl sm:text-3xl font-bold text-black shadow-lg">
                PAYMENT HISTORY
            </h1>
        </div>

        @if(count($payments) > 0)
            @foreach($payments as $payment)
            <div class="bg-gray-900 rounded-3xl overflow-hidden mb-12 shadow-xl">
                <div class="p-8 sm:p-12 md:p-16 flex flex-col md:flex-row gap-8">
                    <div class="md:w-8/12 text-white">
                        <h2 class="text-3xl sm:text-4xl font-bold text-yellow-400 mb-2">{{ $payment->product_name }}</h2>
                        <p class="text-gray-300 mb-4">Order ID: {{ $payment->id }}</p>
                        <p class="text-gray-300 mb-4">Date: {{ $payment->created_at->format('F j, Y') }}</p>
                        <p class="text-gray-300 mb-4">Amount: Rp {{ number_format($payment->total_amount, 0, ',', '.') }}</p>
                        <p class="text-gray-300 mb-4">Status: 
                            <span class="px-2 py-1 rounded-full text-sm font-semibold
                                @if($payment->status == 'Accepted')
                                    bg-green-500 text-white
                                @elseif($payment->status == 'Pending')
                                    bg-yellow-500 text-black
                                @else
                                    bg-red-500 text-white
                                @endif
                            ">
                                {{ $payment->status }}
                            </span>
                        </p>
                        <p class="text-gray-300 mb-4" >Active Until: {{ \Carbon\Carbon::parse($payment->end_date)->format('F j, Y') }}</p>
                    </div>
                    <div class="md:w-4/12 flex items-center justify-center">
                        @if($payment->status == 'Completed')
                            <a href="{{ route('invoice.download', $payment->id) }}" class="bg-yellow-400 text-black font-bold py-3 px-6 rounded-full hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                                Download Invoice
                            </a>
                        @elseif($payment->status == 'Pending')
                            <a href="{{ route('payment.retry', $payment->id) }}" class="bg-yellow-400 text-black font-bold py-3 px-6 rounded-full hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                                Retry Payment
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

           
        @else
            <div class="bg-gray-900 rounded-3xl overflow-hidden mb-12 shadow-xl">
                <div class="p-8 sm:p-12 md:p-16 text-center text-white">
                    <h2 class="text-3xl sm:text-4xl font-bold text-yellow-400 mb-4">No Payment History</h2>
                    <p class="text-gray-300 mb-6">You haven't made any payments yet.</p>
                    <a href="{{ route('products') }}" class="inline-block bg-yellow-400 text-black font-bold py-3 px-6 rounded-full hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                        Browse Products
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection


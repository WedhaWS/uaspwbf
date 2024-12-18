@extends('layouts.app')

@section('content')
    <section class="relative h-[40vh] min-h-[300px] bg-cover bg-center bg-no-repeat flex items-center justify-center"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/payment-bg.jpg') }}');">
        <div class="absolute inset-0 bg-cover bg-center opacity-10 pointer-events-none"
            style="background-image: url('{{ asset('images/Makanan.jpg') }}');"></div>
        <div class="relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white uppercase tracking-wider">
                PAYMENT <span class="text-yellow-400">DETAILS</span>
            </h1>
        </div>
    </section>

    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Complete Your Order</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-4">Personal Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                    <input type="text" id="name" value="{{ $user->name }}" name="name" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email
                                        Address</label>
                                    <input type="email" id="email" value="{{ $user->email }}" name="email" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone
                                        Number</label>
                                    <input type="tel" id="phone" value="{{ $user->no_hp }}" name="phone" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700">Delivery
                                        Address</label>
                                    <textarea id="address" name="address" rows="3" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50"></textarea>
                                </div>
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" id="city" name="city" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                </div>
                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal
                                        Code</label>
                                    <input type="text" id="postal_code" name="postal_code" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-700 mb-4">Order Summary</h3>
                            <div class="bg-gray-50 p-4 rounded-md mb-6">
                                <div class="flex justify-between mb-2">
                                    <span class="font-medium">{{ $id->name }}</span>
                                    <span>Rp {{ number_format($id->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="border-t border-gray-200 mt-4 pt-4 flex justify-between">
                                    <span class="font-bold">Total</span>
                                    <span class="font-bold">Rp {{ number_format($id->price, 0, ',', '.') }}</span>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="mt-8">
                        <button id="pay-button"
                            class="w-full bg-yellow-400 text-black font-bold py-3 px-6 rounded-full hover:bg-yellow-500 transition duration-300 transform hover:scale-105">
                            COMPLETE PAYMENT
                        </button>
                        <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Our Guarantee</h2>
            <p class="text-lg mb-8">If you're not satisfied with our meals or don't see results, we offer a 100% money-back
                guarantee!</p>
            <div class="flex justify-center items-center space-x-4">
                <span class="bg-yellow-400 rounded-full w-12 h-12 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <span class="text-xl font-semibold">100% Satisfaction Guaranteed</span>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('<?= $snapToken ?>', {
                // Optional
                onSuccess: function(result) {
                    let data = {
                        name: $('#name').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val(),
                        address: $('#address').val(),
                        city: $('#city').val(),
                        postal_code: $('#postal_code').val(),
                        _token: '{{ csrf_token() }}' // Tambahkan token CSRF
                    };

                $.ajax({
                url: '/payment-confirm',
                method: 'POST',
                data: data,
                success: function (response) {
                    window.location.replace("http://127.0.0.1:8000");
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            });
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection

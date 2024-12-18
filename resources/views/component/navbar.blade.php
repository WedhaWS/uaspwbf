<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/weight.jpg') }}" alt="WeightMate Logo" class="h-8 w-auto">
                <span class="text-xl font-bold text-gray-800">WeightMate</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-6">
                <a href="/" class="text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">Home</a>
                <a href="{{ route('menu') }}" class="text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">Menus</a>
                <a href="{{ route('product') }}" class="text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">Pricing</a>
                <a href="{{ route('testimoni') }}" class="text-gray-600 hover:text-gray-800 transition duration-150 ease-in-out">Testimoni</a>
                @guest
    <!-- Tampilkan tombol Login jika pengguna belum login -->
    <a href="{{ route('login') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out">
        Login
    </a>
    @endguest

    @auth
    <!-- Avatar untuk pengguna yang sudah login -->
    <div class="relative">
        <img 
            src="{{ asset('asset/img/avatar.jpg')}}" 
            alt="Avatar" 
            class="w-10 h-10 rounded-full cursor-pointer"
            id="avatar-menu"
        >
        <!-- Dropdown menu -->
        <div 
            id="dropdown-menu" 
            class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible transition-opacity duration-300 z-10"
        >
            <a href="{{ route('transaction.history') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">History Transaction</a>
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Log out</a>
        </div>
    </div>
    @endauth
            </div>

            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600" aria-label="Toggle menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Home</a>
            <a href="{{ route('menu') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Menus</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Pricing</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Services</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium bg-green-500 text-white hover:bg-green-600">Get the App</a>
        </div>
    </div>
</nav>

<script>document.addEventListener("DOMContentLoaded", function() {
    const avatar = document.getElementById("avatar-menu");
    const dropdown = document.getElementById("dropdown-menu");

    avatar.addEventListener("click", function() {
        // Toggle visibility
        if (dropdown.classList.contains("opacity-0")) {
            dropdown.classList.remove("opacity-0", "invisible");
            dropdown.classList.add("opacity-100", "visible");
        } else {
            dropdown.classList.remove("opacity-100", "visible");
            dropdown.classList.add("opacity-0", "invisible");
        }
    });

    // Klik di luar dropdown untuk menutupnya
    document.addEventListener("click", function(event) {
        if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.remove("opacity-100", "visible");
            dropdown.classList.add("opacity-0", "invisible");
        }
    });
});</script>
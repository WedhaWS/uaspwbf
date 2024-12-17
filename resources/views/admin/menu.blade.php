<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Menu</title>
    <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            background: white;
        }

        .logo {
            width: 40px;
            height: 40px;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
        }

        .nav-links a {
            color: #4a4a4a;
            text-decoration: none;
            font-size: 1rem;
        }

        .get-app-btn {
            background-color: #7ed957;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
        }

        .menu-hero {
            position: relative;
            width: 100%;
            height: 60vh;
            min-height: 400px;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                        url('{{ asset("images/menu-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menu-title {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .menu-title h1 {
            font-size: 5rem;
            font-weight: 800;
            color: white;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
            padding: 0;
            line-height: 1;
            font-family: 'Arial Black', sans-serif;
        }

        .menu-title span {
            color: #FFD700;
        }

        /* Optional decorative elements */
        .menu-title::before,
        .menu-title::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background: #FFD700;
            top: 50%;
            transform: translateY(-50%);
        }

        .menu-title::before {
            left: -80px;
        }

        .menu-title::after {
            right: -80px;
        }

        /* Spice flour effect overlay */
        .flour-effect {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset("images/flour-overlay.png") }}');
            background-size: cover;
            opacity: 0.1;
            pointer-events: none;
        }

        @media (max-width: 768px) {
            .menu-hero {
                height: 40vh;
            }

            .menu-title h1 {
                font-size: 3.5rem;
            }

            .menu-title::before,
            .menu-title::after {
                width: 40px;
            }

            .menu-title::before {
                left: -50px;
            }

            .menu-title::after {
                right: -50px;
            }
        }

        @media (max-width: 480px) {
            .menu-title h1 {
                font-size: 2.5rem;
            }

            .menu-title::before,
            .menu-title::after {
                display: none;
            }
        }
    </style>
</head>
<body>

    <body>
        <nav class="navbar">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <div class="nav-links">
                <a href="#">About</a>
                <a href="#">Menus</a>
                <a href="#">Pricing</a>
                <a href="#">Services</a>
            </div>
            <a href="#" class="get-app-btn">Get the App</a>
        </nav>

       <section class="menu-hero">
        <div class="flour-effect"></div>
        <div class="menu-title">
            <h1>OUR <span>MENU</span></h1>
        </div>
    </section>

    <!-- Rest of your menu content will go here -->

    <div class="menu-section">
        <div class="menu-content">
            <h2 class="menu-title">Menu yang disediakan WeightMate rendah kalori, rendah lemak dan tinggi protein. Rasanya juga tidak hambar dan bervariasi yang bisa buat diet kamu menyenangkan!</h2>
            <div class="menu-button">
                <span>OUR MENU</span>
            </div>
        </div>
    </div>
    
    <style>
    .menu-section {
        position: relative;
        width: 100%;
        background-color: #1a1a1a;
        padding: 60px 20px;
        overflow: hidden;
    }
    
    .menu-content {
        max-width: 1200px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 2;
    }
    
    .menu-title {
        color: white;
        font-size: 1.25rem;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto 40px;
        font-weight: 500;
    }
    
    .menu-button {
        display: inline-block;
        background-color: #FFD700;
        padding: 15px 40px;
        border-radius: 50px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    
    .menu-button:hover {
        transform: scale(1.05);
    }
    
    .menu-button span {
        color: black;
        font-weight: 700;
        font-size: 1.2rem;
        text-transform: uppercase;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .menu-title {
            font-size: 1.1rem;
            padding: 0 20px;
        }
        
        .menu-button {
            padding: 12px 30px;
        }
        
        .menu-button span {
            font-size: 1rem;
        }
    }
    
    /* Optional: Add a subtle gradient overlay */
    .menu-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.2) 100%);
        z-index: 1;
    }
    </style>

<div class="menu-container">
    <!-- Yellowfit Special Menu -->
    <div class="menu-card">
        <img src="{{ asset('images/pizza.jpg') }}" alt="Pizza Fit" class="menu-image">
        <div class="menu-content">
            <h2 class="menu-title">YELLOWFIT SPECIAL MENU</h2>
            <p class="menu-desc">Pizza Fit + FREE Cheesy Garlic Bread</p>
        </div>
    </div>

    <!-- Indonesian Food -->
    <div class="menu-card">
        <img src="{{ asset('images/ayamgeprek.jpg') }}" alt="Spaghetti Ayam Geprek" class="menu-image">
        <div class="menu-content">
            <h2 class="menu-title">INDONESIAN FOOD</h2>
            <p class="menu-desc">Spaghetti Ayam Geprek + FREE Croutons</p>
        </div>
    </div>

    <!-- Western Food -->
    <div class="menu-card">
        <img src="{{ asset('images/mushroomstuffed.jpg') }}" alt="Cheesy Mushroom" class="menu-image">
        <div class="menu-content">
            <h2 class="menu-title">WESTERN FOOD</h2>
            <p class="menu-desc">Cheesy Mushroom Stuffed Chicken </p>
        </div>
    </div>
</div>

<div class="menu-container">
    <!-- Yellowfit Special Menu -->
    <div class="menu-card">
        <img src="{{ asset('images/pizza.jpg') }}" alt="Pizza Fit" class="menu-image">
        <div class="menu-content">
            <h2 class="menu-title">JAPANESE FOOD</h2>
            <p class="menu-desc">Pizza Fit + FREE Cheesy Garlic Bread</p>
        </div>
    </div>

    <!-- Indonesian Food -->
    <div class="menu-card">
        <img src="{{ asset('images/ayamgeprek.jpg') }}" alt="Spaghetti Ayam Geprek" class="menu-image">
        <div class="menu-content">
            <h2 class="menu-title">KOREAN FOOD</h2>
            <p class="menu-desc">Spaghetti Ayam Geprek + FREE Croutons</p>
        </div>
    </div>

    <!-- Western Food -->
    <div class="menu-card">
        <img src="{{ asset('images/mushroomstuffed.jpg') }}" alt="Cheesy Mushroom" class="menu-image">
        <div class="menu-content">
            <h2 class="menu-title">OTHER ASIAN FOOD</h2>
            <p class="menu-desc">Cheesy Mushroom Stuffed Chicken </p>
        </div>
    </div>
</div>
<!-- Add this to your CSS file (public/css/app.css) -->
<style>

.menu-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
}

.menu-card {
    background-color: #000;
    border-radius: 12px;
    overflow: hidden;
    text-align: center;
    width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.menu-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.menu-content {
    padding: 15px;
    color: #fff;
}

.menu-title {
    font-size: 18px;
    font-weight: bold;
    color: #ffc107;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.menu-desc {
    font-size: 14px;
    margin: 0;
}
.menu-card {
    transition: transform 0.3s ease-in-out;
}

.menu-card:hover {
    transform: translateY(-5px);
}

.menu-card img {
    transition: transform 0.3s ease-in-out;
}

.menu-card:hover img {
    transform: scale(1.05);
}

/* If you want to add custom shadows */
.menu-card {
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.menu-card:hover {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}
</style>

<style>

    .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        background-color: #000;
        color: white;
        font-family: Arial, sans-serif;
    }

    .benefits-outlet-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 40px;
    }

    .section-card {
        background: rgba(50, 50, 50, 0.8);
        border-radius: 15px;
        padding: 30px;
        position: relative;
        overflow: hidden;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .icon-circle {
        background-color: #FFD700;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .benefits-list {
        list-style: none;
        padding: 0;
    }

    .benefits-list li {
        margin-bottom: 15px;
        padding-left: 20px;
        position: relative;
    }

    .benefits-list li::before {
        content: "•";
        color: #FFD700;
        position: absolute;
        left: 0;
    }

    .outlets-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
    }

    .outlet-item {
        content: "•";
        color: white;
        padding: 8px;
    }

    .stats-section {
        text-align: center;
        margin: 40px 0;
    }

    .stats-number {
        color: #FFD700;
        font-weight: bold;
    }

    .tagline {
        text-align: center;
        font-size: 1.2rem;
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .benefits-outlet-wrapper {
            grid-template-columns: 1fr;
        }

        .outlets-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .section-title {
            font-size: 2rem;
        }
    }
</style>
</head>
<body>
<div class="container">
    <div class="benefits-outlet-wrapper">
        <!-- Benefits Section -->
        <div class="section-card">
            <h2 class="section-title">
                BENEFITS
                <span class="icon-circle">
                    <img src="/api/placeholder/24/24" alt="benefits icon" />
                </span>
            </h2>
            <ul class="benefits-list">
                <li>Makanan YellowFit Kitchen mengandung 450 - 500 kalori di setiap boxnya</li>
                <li>Setiap pelanggan yang berlangganan Yellow Fit Kitchen akan mendapatkan Garansi Uang Kembali apabila makanan dirasa nggak enak, atau jika berat badan customer tidak turun</li>
            </ul>
        </div>

        <!-- Outlet Section -->
        <div class="section-card">
            <h2 class="section-title">
                OUTLET
                <span class="icon-circle">
                    <img src="/api/placeholder/24/24" alt="outlet icon" />
                </span>
            </h2>
            <div class="outlets-grid">
                <div class="outlet-item">Jakarta</div>
                <div class="outlet-item">Tangerang</div>
                <div class="outlet-item">Palembang</div>
                <div class="outlet-item">Yogyakarta</div>
                <div class="outlet-item">Bogor</div>
                <div class="outlet-item">Surabaya</div>
                <div class="outlet-item">Malang</div>
                <div class="outlet-item">Solo</div>
                <div class="outlet-item">Depok</div>
                <div class="outlet-item">Bandung</div>
                <div class="outlet-item">Pekan Baru</div>
                <div class="outlet-item">Bekasi</div>
                <div class="outlet-item">Medan</div>
                <div class="outlet-item">Semarang</div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <p>Sampai saat ini, Yellow Fit Kitchen</p>
        <p>telah berhasil menurunkan berat badan <span class="stats-number">299.492</span> customer</p>
    </div>

    <!-- Tagline -->
    <div class="tagline">
        Diet Murah, Mudah, Menyenangkan. Yuk mulai diet dan jalani pola hidup sehat
    </div>
</div>
</body>
</html>
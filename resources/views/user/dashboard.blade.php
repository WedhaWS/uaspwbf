<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeightMate</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #1a1a1a;
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .order-now {
            background-color: #FFD700;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            color: black;
            font-weight: bold;
            text-decoration: none;
        }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/images/background.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            padding: 120px 5% 50px;
            color: white;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .subtitle {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .main-title {
            font-size: 3.5rem;
            margin-bottom: 2rem;
        }

        .yellowfit-button {
            display: inline-block;
            padding: 1rem 3rem;
            background-color: transparent;
            border: 2px solid #FFD700;
            color: #FFD700;
            font-size: 1.5rem;
            border-radius: 30px;
            text-decoration: none;
            margin-bottom: 2rem;
        }

        .features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .features li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .features li:before {
            content: '✓';
            color: #FFD700;
            margin-right: 10px;
            font-size: 1.4rem;
        }

        .influencers {
            background: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .diet-solution {
            color: #FFD700;
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .catering-info {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .red-rice {
            color: #FFD700;
        }

        .guarantee {
            margin: 2rem 0;
            font-size: 1.2rem;
        }

        .money-back {
            color: #FFD700;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 2px solid #FFD700;
            display: inline-block;
        }

        .batch-info {
            margin-top: 2rem;
        }

        .batch-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .batch-dates {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .main-title {
                font-size: 2.5rem;
            }

            .diet-solution {
                font-size: 2rem;
            }

            .catering-info {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="logo">
            <img src="{{ asset('images/pizza.jpg') }}" alt="WeigthMate Logo">
            WeightMate
        </a>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Menu</a>
            <a href="#">Our Products</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="#">Pricelist</a>
            <a href="#">FAQ</a>
        </div>
        <a href="#" class="order-now">ORDER NOW</a>
    </nav>

    <main class="hero">
        <div class="hero-content">
            <p class="subtitle">Bingung Tiap Hari</p>
            <h1 class="main-title">Makan Siang Apa?</h1>
            
            <a href="#" class="yellowfit-button">WEIGHTMATE AJA!</a>
            
            <ul class="features">
                <li>Harga cuma 50 ribuan</li>
                <li>Dimasak Chef Ex-Hotel Bintang 5</li>
                <li>FREE ongkir sampai depan pintu kantor atau rumah</li>
            </ul>

        

            <div class="diet-info">
                <h2 class="diet-solution">SOLUSI DIETMU!</h2>
                <p class="catering-info">
                    DIET & HEALTHY CATERING NO.1 DI INDONESIA<br>
                    YANG PERTAMA MENGGUNAKAN <span class="red-rice">NASI MERAH PULEN!</span>
                </p>

                <div class="guarantee">
                    <p>Sudah ikut program WeightMate<br>
                    tapi berat badan kamu enggak turun?<br>
                    Atau makanan enggak enak?</p>
                    <p class="money-back">UANG KEMBALI 100%</p>
                </div>

                <div class="batch-info">
                    <h3 class="batch-title">OPEN ORDER BATCH 50</h3>
                    <p class="batch-dates">16 December 2024 - 22 December 2024</p>
                    <p>Close order in: 1d 8h 20m 16s</p>
                </div>
            </div>
        </div>
    </main>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1500px;
            margin: 0 auto;
            padding: 2rem;
        }

        .programs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 1rem;
        }

        .program-card {
            background-color: #000;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .program-card:hover {
            transform: translateY(-5px);
        }

        .program-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .program-content {
            padding: 1.5rem;
            text-align: center;
        }

        .program-title {
            color: #FFD700;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .program-subtitle {
            color: #fff;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .see-more-btn {
            display: inline-block;
            background-color: #FFD700;
            color: #000;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .see-more-btn:hover {
            background-color: #FFC800;
        }

        .product-label h2 {
                font-size: 1.5rem;
            }

        .product-label-container {
            position: relative;
            text-align: center;
            margin-bottom: 3rem;
        }

        @media (max-width: 768px) {
            .programs-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="product-label-container">
        <div class="product-label">
            <h2>OUR PRODUCT</h2>
        </div>
    </div>

    <div class="container">
        <div class="programs-grid">
            <!-- Weight Loss Program Card -->
            <div class="program-card">
                <img src="images/weightlossprogram.jpg" alt="Weight Loss Program" class="program-image">
                <div class="program-content">
                    <h2 class="program-title">Weight Loss Program</h2>
                    <p class="program-subtitle">(Program Menurunkan berat badan)</p>
                    <a href="#" class="see-more-btn">See More</a>
                </div>
            </div>

            <!-- Weight Loss Protein+ Card -->
            <div class="program-card">
                <img src="images/weightlossprotein.jpg" alt="Weight Loss Protein+" class="program-image">
                <div class="program-content">
                    <h2 class="program-title">Weight Loss Protein+</h2>
                    <p class="program-subtitle">(Program for Men)</p>
                    <a href="#" class="see-more-btn">See More</a>
                </div>
            </div>

            <!-- Yellow Fitness Card -->
            <div class="program-card">
                <img src="images/fitness.jpg" alt="Yellow Fitness" class="program-image">
                <div class="program-content">
                    <h2 class="program-title">WeightMate Fitness</h2>
                    <p class="program-subtitle">E-book & Workout videos</p>
                    <a href="#" class="see-more-btn">See More</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .guarantee-section {
            position: relative;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('/images/fire-background.jpg') center/cover;
            padding: 4rem 1rem;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .guarantee-heading {
            text-align: center;
            color: #ffffff;
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 3rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-transform: uppercase;
        }

        .features-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1200px;
            width: 100%;
            gap: 2rem;
        }

        .feature-item {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            min-width: 250px;
        }

        .feature-icon {
            background-color: #FFD700;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }

        .feature-icon img {
            width: 60px;
            height: 60px;
        }

        .feature-text {
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.4;
            max-width: 200px;
        }

        @media (max-width: 768px) {
            .guarantee-heading {
                font-size: 2.5rem;
            }

            .features-container {
                flex-direction: column;
                align-items: center;
            }

            .feature-item {
                margin-bottom: 2rem;
            }
        }
    </style>
</head>
<body>
    <section class="guarantee-section">
        <h1 class="guarantee-heading">99% Fat Loss Guaranteed!</h1>
        
        <div class="features-container">
            <div class="feature-item">
                <div class="feature-icon">
                    <img src="images/healthy-heart.png" alt="Healthy Food Icon">
                </div>
                <div class="feature-text">
                    Delicious,<br>
                    Healthy,<br>
                    Good<br>
                    Quality
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <img src="images/waist.png" alt="Diet Methods Icon">
                </div>
                <div class="feature-text">
                    Simple<br>
                    Diet<br>
                    Methods
                </div>
            </div>

            <div class="feature-item">
                <div class="feature-icon">
                    <img src="images/affordable.png" alt="Affordable Price Icon">
                </div>
                <div class="feature-text">
                    Affordable<br>
                    Price and<br>
                    Free<br>
                    Delivery
                </div>
            </div>
        </div>
    </section>
</body>
</html>
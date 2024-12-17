<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery Service</title>
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

        .hero {
            text-align: center;
            padding: 5rem 1rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3.5rem;
            color: #2d2d2d;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero p {
            color: #666;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 4rem;
        }

        .primary-btn {
            background-color: #7ed957;
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
        }

        .secondary-btn {
            background-color: #2d2d2d;
            color: white;
            padding: 1rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
        }

        .food-gallery {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            padding: 2rem 5%;
            scroll-snap-type: x mandatory;
        }

        .food-card {
            flex: 0 0 300px;
            border-radius: 15px;
            overflow: hidden;
            scroll-snap-align: start;
        }

        .food-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .gallery-dots {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #ddd;
        }

        .dot.active {
            background-color: #7ed957;
            width: 24px;
            border-radius: 4px;
        }

        .decoration {
            position: relative;
        }

        .decoration::after {
            content: '';
            position: absolute;
            right: -20px;
            bottom: -10px;
            width: 80px;
            height: 40px;
            border: 2px solid #7ed957;
            border-bottom: none;
            border-left: none;
            border-radius: 50px;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .food-gallery {
                gap: 1rem;
            }

            .food-card {
                flex: 0 0 250px;
            }
        }
    </style>
</head>
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

    <main class="hero">
        <h1>Your Favorite Food<br>
            <span class="decoration">Delivered Hot & Fresh</span>
        </h1>
        <p>Best food catering service in your town. We are ready to serve your desire. The ultimate destination for all your healthy food delivery needs.</p>
        
        <div class="hero-buttons">
            <a href="#" class="primary-btn">Order Now</a>
            <a href="#" class="secondary-btn">See the menus</a>
        </div>

        <div class="food-gallery">
            <div class="food-card">
                <img src="{{ asset('images/food1.jpg') }}" alt="Mixed Grill Platter">
            </div>
            <div class="food-card">
                <img src="{{ asset('images/food2.jpg') }}" alt="Steak with Vegetables">
            </div>
            <div class="food-card">
                <img src="{{ asset('images/food3.jpg') }}" alt="Grilled Salmon">
            </div>
            <div class="food-card">
                <img src="{{ asset('images/food4.jpg') }}" alt="Fresh Salad">
            </div>
            <div class="food-card">
                <img src="{{ asset('images/food5.jpg') }}" alt="Dessert">
            </div>
        </div>

        <div class="gallery-dots">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </main>
</body>
</html>
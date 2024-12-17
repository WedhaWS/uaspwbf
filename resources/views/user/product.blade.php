@extends('layouts.app')

@section('content')
<div class="product-section">
    <div class="product-header">
        <h1>OUR PRODUCT</h1>
    </div>
    
    <div class="product-card">
        <div class="product-content">
            <div class="product-image">
                <img src="{{ asset('images/diet-meal.jpg') }}" alt="Weight Loss Program Meal">
            </div>
            <div class="product-info">
                <h2>WEIGHT LOSS PROGRAM</h2>
                <h3>(Program Menurunkan berat badan)</h3>
                <p>
                    Penurunan berat badan diartikan sebagai penurunan massa dan lemak tubuh. 
                    Penurunan berat badan dapat terjadi karena dilakukan proses diet atau 
                    pengaturan makan secara tepat dan konsisten. Karena banyak orang di luar 
                    sana yang memiliki mindset yang salah mengenai diet, kalau diet itu 
                    makanannya hambar, diet itu mahal, diet itu susah, diet itu menyiksa, Yellow 
                    Fit Kitchen menawarkan solusi mudah bagi masyarakat Indonesia untuk diet 
                    dan hidup sehat. Pada Program Menurunkan Berat Badan yang disediakan 
                    Yellow Fit Kitchen, customer dapat merasakan bahwa diet itu mudah, murah, 
                    enak, dan menyenangkan.
                </p>
                <button class="see-more-btn">SEE MORE</button>
            </div>
        </div>
    </div>
</div>

<div class="product-card">
    <div class="product-content">
        <div class="product-image">
            <img src="{{ asset('images/diet-meal.jpg') }}" alt="Weight Loss Program Meal">
        </div>
        <div class="product-info">
            <h2>WEIGHT LOSS PROTEIN+</h2>
            <h3>(Program for Men)</h3>
            <p>
                Solusi untuk Pria dan Wanita yang berolahraga, yang mau menurunkan berat badan dan menerapkan pola hidup sehat dengan mudah, murah, dan menyenangkan.
                 Sudah disetujui oleh Dokter Gizi terbaik di Indonesia dan sudah dibuktikan oleh ratusan ribu konsumen kami yang berhasil.
            </p>
            <button class="see-more-btn">SEE MORE</button>
        </div>
    </div>
    </div>
</div>

<div class="product-card">
    <div class="product-content">
        <div class="product-image">
            <img src="{{ asset('images/diet-meal.jpg') }}" alt="Weight Loss Program Meal">
        </div>
        <div class="product-info">
            <h2>WEIGHT LOSS PROTEIN+</h2>
            <h3>(Program for Men)</h3>
            <p>
                YellowFitness adalah solusi mudah untuk kamu yang mau memiliki pola hidup yang sehat. Kalau kamu berlangganan YellowFitness kamu akan mendapatkan dua hal, yaitu Video program olahraga yang tersedia untuk pemula maupun expert dan E-book tentang diet dan pola hidup sehat.

Cuma Rp. 10.000,- loh harganya! Murah kan? Yuk beli sekarang!
            </p>
            <button class="see-more-btn">SEE MORE</button>
        </div>
    </div>
    </div>
</div>



<style>
.product-section {
    padding: 40px 20px;
    background-color: #f8f9fa;
    min-height: 100vh;
}

.product-header {
    text-align: center;
    margin-bottom: 40px;
    position: relative;
}

.product-header h1 {
    display: inline-block;
    background-color: #FFD700;
    padding: 15px 40px;
    border-radius: 30px;
    font-weight: bold;
    font-size: 2em;
    color: #000;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.product-card {
    max-width: 1200px;
    margin: 0 auto;
    background-color: #1a1a1a;
    border-radius: 25px;
    overflow: hidden;
    padding: 100px;
}

.product-content {
    display: flex;
    gap: 30px;
    align-items: center;
}

.product-image {
    flex: 0 0 45%;
}

.product-image img {
    width: 100%;
    border-radius: 15px;
    display: block;
}

.product-info {
    flex: 0 0 55%;
    color: #fff;
}

.product-info h2 {
    font-size: 2.5em;
    font-weight: bold;
    color: #FFD700;
    margin-bottom: 10px;
}

.product-info h3 {
    font-size: 1.2em;
    color: #fff;
    margin-bottom: 20px;
}

.product-info p {
    font-size: 1em;
    line-height: 1.6;
    margin-bottom: 30px;
}

.see-more-btn {
    background-color: #FFD700;
    color: #000;
    border: none;
    padding: 12px 40px;
    border-radius: 25px;
    font-weight: bold;
    font-size: 1.1em;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

.see-more-btn:hover {
    background-color: #FFC800;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .product-content {
        flex-direction: column;
    }
    
    .product-image,
    .product-info {
        flex: 0 0 100%;
    }
    
    .product-info h2 {
        font-size: 2em;
    }
    
    .product-header h1 {
        font-size: 1.5em;
    }
}
</style>
@endsection
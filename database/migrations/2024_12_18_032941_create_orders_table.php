<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('discount_amount');
            $table->string('code');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID pengguna yang membuat order
            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->unsignedBigInteger('product_id'); // ID produk yang dipesan
            $table->dateTime('order_date')->useCurrent(); // Tanggal order dibuat
            $table->integer('total_amount'); // Total jumlah uang yang dibayar
            $table->string('status')->default('pending'); // Status pesanan (e.g., pending, completed)
            $table->string('address'); // Alamat pengiriman
            $table->string('city'); // Kota pengguna
            $table->string('postal_code'); // Kode pos pengguna
            $table->dateTime('start_date')->nullable(); // Tanggal mulai Paket
            $table->dateTime('end_date')->nullable(); // Tanggal akhir Paket
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('promo_code_id')->references('id')->on('promo_codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');    
        Schema::dropIfExists('orders');
    }
};

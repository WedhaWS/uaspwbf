<?php

namespace Tests\Feature;

use App\Filament\Resources\OrdersResource;
use App\Models\Order;
use App\Models\Orders;
use App\Models\User;
use PHPUnit\Framework\Assert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    
        // Authenticated user can initiate payment for a valid product
        public function test_authenticated_user_can_initiate_payment()
        {
            // Membuat pengguna dan mengotentikasi
            $user = User::factory()->create();
            $this->actingAs($user);
        
            // Membuat produk dengan harga tertentu
            $product = Product::factory()->create(['price' => 1000]);
        
            // Ekspektasi data pesanan
            $expectedOrder = [
                'user_id' => $user->id,
                'product_id' => $product->id,
                'status' => 'pending',
                'total_amount' => $product->price
            ];
        
            // Mock Midtrans Snap Token
            Config::set('services.midtrans.server_key', 'test-server-key');
        
            $mockSnap = \Mockery::mock('alias:\Midtrans\Snap');
            $mockSnap->shouldReceive('getSnapToken')
                     ->once()
                     ->andReturn('test-snap-token');
        
            // Mengakses route pembayaran
            $response = $this->get(route('payment', $product->id));
        
            // Validasi respons
            $response->assertStatus(200);
            $response->assertViewIs('user.payment');
            $response->assertViewHas(['id', 'user', 'snapToken']);
            $this->assertEquals('test-snap-token', $response->viewData('snapToken'));
        
            // Validasi data pesanan dalam sesi
            $this->assertEquals($expectedOrder, session('Orders'));
        
            // Mengakhiri mockery
            \Mockery::close();
        }
        
}

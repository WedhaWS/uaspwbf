<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_order()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/orders', [
            'product_id' => 1,
            'quantity' => 2,
            'address' => 'Jl. Contoh Alamat No. 123',
        ]);

        $response->assertStatus(201); 
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'product_id' => 1,
            'quantity' => 2,
        ]);
    }

   
    public function test_view_order()
    {
        $user = User::factory()->create();
        $order = Orders::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get("/orders/{$order->id}");

        $response->assertStatus(200);
        $response->assertSee($order->id);
    }
}

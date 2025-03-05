<?php

namespace Tests\Feature;

use App\Models\PromoCode;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PromoCodeTest extends TestCase
{
    use RefreshDatabase;

   
    public function test_apply_valid_promo_code()
    {
        $user = User::factory()->create();
        $promoCode = PromoCode::factory()->create([
            'code' => 'DISKON50',
            'discount_percentage' => 50,
            'is_active' => true,
        ]);

        $response = $this->actingAs($user)->post('/promo-codes/apply', [
            'code' => 'DISKON50',
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Kode promo berhasil digunakan',
            'discount' => 50,
        ]);
    }

   
    public function test_apply_invalid_promo_code()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/promo-codes/apply', [
            'code' => 'INVALIDCODE',
        ]);

        $response->assertStatus(400);
        $response->assertJson([
            'message' => 'Kode promo tidak valid',
        ]);
    }
}

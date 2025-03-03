<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Pengujian Create (Membuat Data).
     */
    public function test_create_product()
    {
        $response = $this->post('/products', [
            'name' => 'Product A',
            'price' => 10000,
            'description' => 'Deskripsi produk A',
        ]);

        $response->assertStatus(201); // Asumsi menggunakan status HTTP 201 (Created)
        $this->assertDatabaseHas('products', ['name' => 'Product A']);
    }

    /**
     * Pengujian Read (Membaca Data).
     */
    public function test_read_products()
    {
        $product = Product::factory()->create();

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee($product->name);
    }

    /**
     * Pengujian Update (Memperbarui Data).
     */
    public function test_update_product()
    {
        $product = Product::factory()->create([
            'name' => 'Product B',
            'price' => 15000,
        ]);

        $response = $this->put("/products/{$product->id}", [
            'name' => 'Product B Updated',
            'price' => 20000,
        ]);

        $response->assertStatus(200); // Asumsi status HTTP 200 (OK)
        $this->assertDatabaseHas('products', ['name' => 'Product B Updated']);
    }

    /**
     * Pengujian Delete (Menghapus Data).
     */
    public function test_delete_product()
    {
        $product = Product::factory()->create();

        $response = $this->delete("/products/{$product->id}");

        $response->assertStatus(204); // Asumsi status HTTP 204 (No Content)
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}

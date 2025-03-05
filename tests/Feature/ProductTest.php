<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use App\Models\Product;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

  
       // Returns view 'products.index' with paginated products data
       protected function setUp(): void
       {
           parent::setUp();
           $this->user = User::factory()->create();
           $this->actingAs($this->user);
       }
   
       public function test_index_displays_products()
       {
           Product::factory()->count(3)->create();
   
           $response = $this->get(route('products.index'));
   
           $response->assertStatus(200);
           $response->assertViewIs('products.index');
           $response->assertViewHas('products');
       }
   
       public function test_create_displays_form()
       {
           $response = $this->get(route('products.create'));
   
           $response->assertStatus(200);
           $response->assertViewIs('products.create');
       }
   
       public function test_store_saves_new_product()
       {
           Storage::fake('public');
           $image = UploadedFile::fake()->image('product.jpg');
   
           $response = $this->post(route('products.store'), [
               'name' => 'Test Product',
               'description' => 'Test Description',
               'price_weekly' => 1000,
               'price_monthly' => 3000,
               'calories' => 500,
               'image' => $image,
           ]);
   
           $this->assertDatabaseHas('products', [
               'name' => 'Test Product',
           ]);
   
           Storage::disk('public')->assertExists('products/' . $image->hashName());
   
           $response->assertRedirect(route('products.index'));
           $response->assertSessionHas('success', 'Produk berhasil ditambahkan.');
       }
   
       public function test_edit_displays_edit_form()
       {
           $product = Product::factory()->create();
   
           $response = $this->get(route('products.edit', $product->id));
   
           $response->assertStatus(200);
           $response->assertViewIs('products.edit');
           $response->assertViewHas('product', $product);
       }
   
       public function test_update_modifies_product()
       {
           Storage::fake('public');
           $product = Product::factory()->create();
           $image = UploadedFile::fake()->image('new-product.jpg');
   
           $response = $this->put(route('products.update', $product->id), [
               'name' => 'Updated Product',
               'description' => 'Updated Description',
               'price_weekly' => 1500,
               'price_monthly' => 4000,
               'calories' => 600,
               'image' => $image,
           ]);
   
           $this->assertDatabaseHas('products', [
               'id' => $product->id,
               'name' => 'Updated Product',
           ]);
   
           Storage::disk('public')->assertExists('products/' . $image->hashName());
   
           $response->assertRedirect(route('products.index'));
           $response->assertSessionHas('success', 'Produk berhasil diperbarui.');
       }
   
       public function test_destroy_deletes_product()
       {
           Storage::fake('public');
           $product = Product::factory()->create([
               'image' => 'products/test-product.jpg'
           ]);
   
           Storage::disk('public')->put('products/test-product.jpg', 'dummy content');
   
           $response = $this->delete(route('products.destroy', $product->id));
   
           $this->assertDatabaseMissing('products', [
               'id' => $product->id,
           ]);
   
           Storage::disk('public')->assertMissing('products/test-product.jpg');
   
           $response->assertRedirect(route('products.index'));
           $response->assertSessionHas('success', 'Produk berhasil dihapus.');
       }
}

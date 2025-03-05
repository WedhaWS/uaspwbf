<?php

namespace Tests\Feature;

use App\Models\Testimonial;
use App\Models\Testimonials;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TestimonialTest extends TestCase
{
    use RefreshDatabase;

    
    public function test_create_testimonial()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/testimonials', [
            'user_id' => $user->id,
            'content' => 'Layanan sangat memuaskan!',
            'rating' => 5,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('testimonials', [
            'user_id' => $user->id,
            'content' => 'Layanan sangat memuaskan!',
            'rating' => 5,
        ]);
    }

    public function test_view_all_testimonials()
    {
        $testimonial = Testimonials::factory()->create([
            'content' => 'Sangat direkomendasikan!',
            'rating' => 5,
        ]);

        $response = $this->get('/testimonials');

        $response->assertStatus(200);
        $response->assertSee($testimonial->content);
    }
}

<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Pengujian registrasi user.
     */
    public function test_registration()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/home'); // Asumsi setelah registrasi diarahkan ke /home
        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']);
    }

    /**
     * Pengujian login user.
     */
    public function test_login()
    {
        // Buat user contoh untuk login
        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'johndoe@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/home'); // Asumsi setelah login diarahkan ke /home
        $this->assertAuthenticatedAs($user);
    }
}

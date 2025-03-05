<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\RegisterController; // Sesuaikan namespace
use App\Http\Controllers\AuthController;
use App\Models\JenisUser; // Sesuaikan namespace model
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase; // Menggunakan TestCase dari Laravel
use Illuminate\View\View;

class RegisterTest extends TestCase // Bukan PHPUnit\Framework\TestCase
{
    use RefreshDatabase;
    use WithFaker;

    private $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new AuthController();
        
        // Menjalankan migrasi untuk database testing
        $this->artisan('migrate');
    }

    public function testShowRegisterReturnsViewWithRoles()
    {
        // Arrange
        $roles = JenisUser::factory()->count(3)->create([
            'nama_jenis_user' => $this->faker->word
        ]);

        // Act
        $response = $this->controller->showRegister();

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('auth.register', $response->name());
        
        $viewData = $response->getData();
        $this->assertArrayHasKey('Roles', $viewData);
        $this->assertCount(3, $viewData['Roles']);
        $this->assertEquals($roles->toArray(), $viewData['Roles']->toArray());
    }

    public function testShowRegisterWithEmptyRoles()
    {
        // Act
        $response = $this->controller->showRegister();

        // Assert
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('auth.register', $response->name());
        
        $viewData = $response->getData();
        $this->assertArrayHasKey('Roles', $viewData);
        $this->assertCount(0, $viewData['Roles']);
    }

    protected function tearDown(): void
    {
        $this->artisan('migrate:rollback');
        parent::tearDown();
    }
}
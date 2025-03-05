<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Models\JenisUser;
use App\Models\User;
use Doctrine\DBAL\Schema\View;
use PHPUnit\Framework\Assert;
use Filament\Http\Livewire\Auth\Login;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

  
public function test_index_login_returns_login_view()
{
    $controller = new LoginController();

    $view = $controller->indexlogin();

    $this->assertEquals('login.login', $view->getName());
    $this->assertInstanceOf(\Illuminate\View\View::class, $view);
}

    
    public function test_show_login_returns_login_view()
    {
        $controller = new AuthController();
    
        $response = $controller->showLogin();
    
        $this->assertEquals('auth.login', $response->getName());
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
    }
}

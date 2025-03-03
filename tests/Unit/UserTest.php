<?php 
namespace Tests\Unit;

use App\Models\JenisUser;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Facade;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Facade::setFacadeApplication($this->app);
        $this->withoutExceptionHandling();
    }

    public static function userDataProvider()
    {
        return [
            'Valid User 1' => [
                ['name' => 'wedha', 'email' => 'wedha123@gmail.com', 'password' => 'wedha123', 'jenis_user_id' => false],
                null
            ],
            'Valid User 2' => [
                ['name' => 'merlin', 'email' => 'merlin123@yahoo.com', 'password' => 'merlin123', 'jenis_user_id' => false],
                null
            ],
            'Invalid Email Format' => [
                ['name' => 'ayunda', 'email' => 'invalid-email', 'password' => 'ayunda123', 'jenis_user_id' => false],
                'Email tidak valid'
            ],
            'Email Already Used' => [
                ['name' => 'wedha', 'email' => 'wedha123@gmail.com', 'password' => 'newpassword', 'jenis_user_id' => false],
                'Email sudah terdaftar'
            ],
        ];
    }
    /**
     * @dataProvider userDataProvider
     */
    public function test_user_registration($input, $expectedError)
    {
        $input['password'] = Hash::make($input['password']);

        try {
            User::create($input);
            $userExists = true;
        } catch (\Exception $e) {
            $userExists = false;
        }

        if ($expectedError === null) {
            $this->assertTrue($userExists, "Registrasi gagal untuk email: {$input['email']}");
        } else {
            $this->assertFalse($userExists, "Expected error: '{$expectedError}', but registration succeeded for email: {$input['email']}");
        }
    }
}
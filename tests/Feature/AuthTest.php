<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertTrue(Auth::check());
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/login');
        $this->assertFalse(Auth::check());
    }
}

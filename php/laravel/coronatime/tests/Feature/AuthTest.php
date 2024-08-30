<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessable()
	{
		$response = $this->get(route('login.view'));
		$response->assertSuccessful();
		$response->assertSee('Welcome back');
		$response->assertViewIs('login');
	}

	public function test_auth_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post(route('login.user'));
		$response->assertSessionHasErrors(
			[
				'username',
				'password',
			]
		);
	}

	public function test_auth_should_give_us_username_error_if_username_input_is_not_provided()
	{
		$response = $this->post(route('login.user'), [
			'password' => 'my-so-secret-password',
		]);
		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_us_password_error_if_password_input_is_not_provided()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
		]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_auth_should_give_us_username_error_if_username_input_is_not_correct()
	{
		$response = $this->post(route('login.user'), [
			'username' => 'this-username-is-invalid',
		]);
		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
	}

	public function test_auth_should_give_us_incorrect_password_error_if_password_input_is_not_correct()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => 'wrong-password',
		]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_auth_should_redirect_to_login_page_if_email_is_not_verified()
	{
		$user = User::factory()->create();
		$user->email_verified_at = null;
		$user->save();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response->assertRedirect(route('login.view'));
		$this->assertGuest();
	}

	public function test_auth_should_redirect_to_dashboard_page_after_successful_login()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$this->assertAuthenticated();
		$response->assertRedirect('dashboard');
	}

	public function test_auth_should_redirect_to_login_page_after_successful_logout()
	{
		$user = User::factory()->create();
		$this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->post(route('logout.user'));
		$response->assertRedirect(route('login.view'));
		$this->assertGuest();
	}
}

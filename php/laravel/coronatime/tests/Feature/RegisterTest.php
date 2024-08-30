<?php

namespace Tests\Feature;

use App\Mail\VerifyMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_register_page_is_accessable()
	{
		$response = $this->get(route('register.view'));
		$response->assertSuccessful();
		$response->assertViewIs('register');
	}

	public function test_register_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post(route('registration.store'));
		$response->assertSessionHasErrors(
			[
				'username',
				'email',
				'password',
			]
		);
	}

	public function test_register_should_give_us_error_if_user_already_exists()
	{
		$user = User::factory()->create();
		$response = $this->post(route('registration.store'), [
			'username'             => $user->username,
			'email'                => $user->email,
			'password'             => $user->password,
			'password_confirmation'=> $user->password_confirmation,
		]);
		$response->assertSessionHasErrors(
			[
				'username',
				'email',
				'password',
			]
		);
	}

	public function test_register_should_give_us_an_error_if_input_is_incorrect()
	{
		$response = $this->post(route('registration.store'), [
			'username'             => 'ts',
			'email'                => 'testgmail.com',
			'password'             => '12',
			'password_confirmation'=> '21',
		]);
		$response->assertSessionHasErrors(
			[
				'username',
				'email',
				'password',
			]
		);
	}

	public function test_register_should_send_email_verification_link_if_user_registered_successfully()
	{
		$user = [
			'id'                   => '1',
			'username'             => 'test',
			'email'                => 'test@gmail.com',
			'password'             => '123',
			'password_confirmation'=> '123',
		];
		$this->post(route('registration.store'), $user);
		$data = [
			'id'           => $user['id'],
			'token'        => sha1($user['email']),
		];
		Mail::fake();
		Mail::to($user['email'])->send(new VerifyMail($data));

		Mail::assertSent(VerifyMail::class);
	}

	public function test_register_should_redirect_to_verification_notice_page_if_user_registered_successfully()
	{
		$response = $this->post(route('registration.store'), [
			'username'             => 'test',
			'email'                => 'test@gmail.com',
			'password'             => '123',
			'password_confirmation'=> '123',
		]);
		$response->assertRedirect(route('verification.notice'));
	}

	public function test_register_should_redirect_to_confirm_verification_page_if_user_verifies_email()
	{
		$user = [
			'id'                   => '1',
			'username'             => 'test',
			'email'                => 'test@gmail.com',
			'password'             => '123',
			'password_confirmation'=> '123',
		];
		$this->post(route('registration.store'), $user);
		$response = $this->get(route('verification.verify', [$user['id'], sha1($user['email'])]));
		$response->assertRedirect(route('email.confirmed'));
	}

	public function test_register_should_redirect_to_login_page_if_user_has_already_verified_email()
	{
		$user = User::factory()->create();
		$response = $this->get(route('verification.verify', [$user->id, sha1($user->email)]));
		$response->assertRedirect(route('login.view'));
	}
}

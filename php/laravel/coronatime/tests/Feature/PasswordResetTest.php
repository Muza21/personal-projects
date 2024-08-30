<?php

namespace Tests\Feature;

use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase;

	public function test_forgot_password_page_is_accessable()
	{
		$response = $this->get(route('password.request'));
		$response->assertSuccessful();
		$response->assertViewIs('forgot-password');
	}

	public function test_forgot_password_page_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post(route('password.email'));
		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
	}

	public function test_forgot_password_page_should_give_us_errors_if_email_does_not_exists()
	{
		$response = $this->post(route('password.email'), [
			'email' => 'test@gmail.com',
		]);
		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
	}

	public function test_forgot_password_page_should_give_us_errors_if_email_format_is_not_provided()
	{
		$response = $this->post(route('password.email'), [
			'email' => 'testgmail.com',
		]);
		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
	}

	public function test_reset_password_should_redirect_to_reset_password_notice_page_after_successful_input()
	{
		$user = User::factory()->create();
		$response = $this->post(route('password.email'), [
			'email' => $user->email,
		]);
		$response->assertRedirect(route('reset.notice'));
	}

	public function test_reset_password_should_send_email_with_reset_link_after_successful_input()
	{
		$user = User::factory()->create();
		$this->post(route('password.email'), [
			'email' => $user->email,
		]);
		$data = [
			'email'=> $user->email,
			'token'=> Str::random(60),
		];
		Mail::fake();
		Mail::to($user->email)->send(new ResetPassword($data));
		Mail::assertSent(ResetPassword::class);
	}

	public function test_reset_password_should_redirect_to_password_reset_form_after_clicking_on_reset_link()
	{
		$user = User::factory()->create();
		$data = [
			'email'=> $user->email,
			'token'=> Str::random(60),
		];
		$response = $this->get(route('password.reset', [$data['token'], $data['email']]));
		$response->assertSuccessful();
		$response->assertViewIs('reset-password');
	}

	public function test_reset_password_should_update_password_on_successful_input()
	{
		$user = User::factory()->create();
		$data = [
			'email'                => $user->email,
			'token'                => Str::random(60),
			'password'             => '1234',
			'password_confirmation'=> '1234',
		];
		$response = $this->post(route('password.update'), $data);
		$response->assertSuccessful();
		$response->assertViewIs('reseted');
	}

	public function test_password_reset_should_give_us_password_error_if_no_password_is_provided()
	{
		$user = User::factory()->create();
		$data = [
			'email'                => $user->email,
			'token'                => Str::random(60),
		];
		$response = $this->post(route('password.update'), $data);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}

	public function test_password_reset_should_give_us_errors_if_no_input_is_provided()
	{
		$response = $this->post(route('password.update'));
		$response->assertSessionHasErrors(
			[
				'password', 'email', 'token',
			]
		);
	}

	public function test_password_reset_should_give_us_password_error_if_password_input_is_incorrect()
	{
		$user = User::factory()->create();
		$data = [
			'email'                => $user->email,
			'token'                => Str::random(60),
			'password'             => '12',
			'password_confirmation'=> '12',
		];
		$response = $this->post(route('password.update'), $data);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}

	public function test_password_reset_should_give_us_password_error_if_password_input_is_confirmed()
	{
		$user = User::factory()->create();
		$data = [
			'email'                => $user->email,
			'token'                => Str::random(60),
			'password'             => '12',
		];
		$response = $this->post(route('password.update'), $data);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}
}

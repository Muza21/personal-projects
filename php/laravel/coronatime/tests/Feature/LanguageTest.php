<?php

namespace Tests\Feature;

use Tests\TestCase;

class LanguageTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_language_will_change_to_english()
	{
		$this->get(route('login.view'));
		$response = $this->get(route('locale.change', 'en'));
		$response->assertRedirect(route('login.view'));
	}

	public function test_language_will_change_to_georgian()
	{
		$this->get(route('login.view'));
		$response = $this->get(route('locale.change', 'ka'));
		$response->assertRedirect(route('login.view'));
	}

	public function test_language_will_change_to_defualt_language_which_is_english_if_wrong_locale_is_provided()
	{
		$page = $this->get(route('login.view'));
		$response = $this->get(route('locale.change', 'es'));
		$response->assertRedirect(route('login.view'));
	}
}

<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryTest extends TestCase
{
	use RefreshDatabase;

	public function test_country_dashboard_page_is_accessable()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('dashboard.view'));
		$response->assertSuccessful();
		$response->assertViewIs('dashboard');
	}

	public function test_country_page_sorts_data_by_country_name_in_ascending_order()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('sort.columns', ['name', 'asc']));
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_sorts_data_by_country_name_in_descending_order()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('sort.columns', ['name', 'desc']));
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_sorts_data_by_country_new_cases_in_ascending_order()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('sort.columns', ['new_cases', 'asc']));
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_sorts_data_by_country_new_cases_in_descending_order()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('sort.columns', ['new_cases', 'desc']));
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_sorts_data_by_country_deaths_in_ascending_order()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('sort.columns', ['deaths', 'asc']));
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_sorts_data_by_country_deaths_in_descending_order()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('sort.columns', ['deaths', 'desc']));
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_sorts_data_by_country_recovered_in_ascending_order()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('sort.columns', ['recovered', 'asc']));
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_sorts_data_by_country_recovered_in_descending_order()
	{
		$user = User::factory()->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);
		$response = $this->get(route('sort.columns', ['recovered', 'desc']));
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_searches_country_by_country_name_when_sorted_by_name_in_ascending_order()
	{
		$user = User::factory()->create();
		$countries = Country::factory(2)->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);

		$response = $this->get(route('sort.columns', ['name', 'asc' . '?search=' . $countries[0]['name']]));
		$response->assertSee($countries[0]['name']);
		$response->assertDontSee($countries[1]['name']);
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_searches_country_by_country_name()
	{
		$user = User::factory()->create();
		$countries = Country::factory(2)->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);

		$response = $this->get(route('sort.columns', ['name', 'desc' . '?search=' . $countries[0]['name']]));
		$response->assertSee($countries[0]['name']);
		$response->assertDontSee($countries[1]['name']);
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_does_not_search_anything_if_wrong_country_name_is_provided()
	{
		$user = User::factory()->create();
		$countries = Country::factory(2)->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);

		$response = $this->get(route('sort.columns', ['name', 'asc' . '?search=' . 'alubali']));
		$response->assertDontSee($countries[0]['name']);
		$response->assertDontSee($countries[1]['name']);
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}

	public function test_country_page_searches_everything_if_no_input_is_provided_in_input_field()
	{
		$user = User::factory()->create();
		$countries = Country::factory(2)->create();
		$response = $this->post(route('login.user'), [
			'username' => $user->username,
			'password' => '123',
		]);

		$response = $this->get(route('sort.columns', ['name', 'asc' . '?search=' . '']));
		$response->assertSee($countries[0]['name']);
		$response->assertSee($countries[1]['name']);
		$response->assertSuccessful();
		$response->assertViewIs('by-country');
	}
}

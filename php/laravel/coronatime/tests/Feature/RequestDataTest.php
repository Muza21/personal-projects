<?php

namespace Tests\Feature;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RequestDataTest extends TestCase
{
	use RefreshDatabase;

	public function test_request_data_will_fetch_data_successfuly_on_fetch_data_command_with_get()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response('{"code":"AF","name":{"en":"Afghanistan","ka":"\u10d0\u10d5\u10e6\u10d0\u10dc\u10d4\u10d7\u10d8"}},{"code":"AL","name":{"en":"Albania","ka":"\u10d0\u10da\u10d1\u10d0\u10dc\u10d4\u10d7\u10d8"}}'),
		]);
		$this->artisan('fetch:data')->assertSuccessful();
	}

	public function test_request_data_will_fetch_data_successfuly_on_fetch_data_command_with_post()
	{
		Http::fake([
			'https://devtest.ge/get-country-statistics' => Http::response('{"id":"1","code":"AF","name":"Afghanistan","confirmed":"221","deaths":"123","recovered":"323"}'),
		]);
		$this->artisan('fetch:data')->assertSuccessful();
	}

	public function test_request_data_will_fetch_data_on_shedule_time()
	{
		$schedule = resolve(Schedule::class);

		$events = $schedule->events();

		$this->assertNotEmpty($events);

		collect($events)->each(function (Event $event) {
			$this->assertSame('0 0 * * *', $event->getExpression());
		});
	}
}

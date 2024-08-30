<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CountryFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'code'                   => fake()->unique()->countryCode(),
			'name'                   => fake()->unique()->country,
			'new_cases'              => fake()->numberBetween($min = 1, $max = 100000),
			'recovered'              => fake()->numberBetween($min = 1, $max = 100000),
			'deaths'                 => fake()->numberBetween($min = 1, $max = 100000),
		];
	}
}

<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	protected $model = Book::class;

	public function definition(): array
	{
		return [
			'name'         => $this->faker->sentence,
			'publish_date' => $this->faker->date,
			'status'       => $this->faker->randomElement(['available', 'occupied']),
		];
	}
}

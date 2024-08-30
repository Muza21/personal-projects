<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$authors = \App\Models\Author::factory(5)->create();
		$books = \App\Models\Book::factory(10)->create();

		$books->each(function ($book) use ($authors) {
			$book->authors()->attach($authors->random()->pluck('id')->toArray());
		});

		\App\Models\User::create([
			'name'     => 'test',
			'email'    => 'test@test.com',
			'password' => bcrypt('1234'),
		]);
	}
}

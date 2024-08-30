<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$categories = [
			['name' => 'Personal'],
			['name' => 'Work'],
			['name' => 'Home'],
			['name' => 'Finance'],
			['name' => 'Education'],
			['name' => 'Social'],
			['name' => 'Travel'],
			['name' => 'Technology'],
			['name' => 'Self-Care'],
			['name' => 'Other'],
		];

		Category::insert($categories);
	}
}

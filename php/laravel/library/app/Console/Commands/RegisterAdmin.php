<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class RegisterAdmin extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'register:admin';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Register admin user';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$name = $this->promptUser('What\'s your name?', 'name', ['required', 'max:255', 'unique:users,name']);
		$email = $this->promptUser('What\'s your email?', 'email', ['required', 'min:3', 'max:255', 'unique:users,email']);
		$password = $this->promptUser('What\'s the password?', 'password', ['required', 'min:3', 'max:255']);

		$password = bcrypt($password);

		User::create([
			'name'     => $name,
			'email'    => $email,
			'password' => $password,
		]);

		$this->info('You have registered successfully!');

		return 0;
	}

	protected function promptUser($question, $field, $rules): ?string
	{
		if ($field === 'password') {
			$value = $this->secret($question);
		} else {
			$value = $this->ask($question);
		}
		if ($message = $this->validateInput($value, $field, $rules)) {
			$this->error($message);

			return $this->promptUser($question, $field, $rules);
		}

		return $value;
	}

	protected function validateInput($value, $field, $rules): ?string
	{
		$validator = Validator::make([
			$field => $value,
		], [
			$field => $rules,
		]);

		return $validator->fails()
			? $validator->errors()->first($field)
			: null;
	}
}

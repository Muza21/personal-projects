<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/
	'password_did_not_match'=> 'პაროლი არასწორია',
	'account_not_verified'  => 'ექაუნთი არ არის ვერიფიცირებული',
	'custom'                => [
		'email' => [
			'required'     => 'ელ-ფოსტა აუცილებელია',
			'max'          => 'ელ-ფოსტა აღემატება 255 სიმბოლოს',
			'unique'       => 'მომხმარებელი ამ ელ-ფოსტით რეგისტრირებულია',
			'min'          => 'ელ-ფოსტა არის ძალიან მოკლე',
		],
		'username' => [
			'unique'            => 'მომხმარებელი ამ სახელით რეგისტრირებულია',
			'required'          => 'მომხმარებელის სახელი აუცილებელია',
			'max'               => 'ელ-ფოსტა აღემატება 255 სიმბოლოს',
			'min'               => 'მომხმარებელის სახელი არის ძალიან მოკლე',
			'exists'            => 'მომხმარებლის სახელი არ არსებობს',
		],
		'password' => [
			'required'          => 'პაროლის შეყვანა აუცილებელია',
			'min'               => 'პაროლი არის ძალიან მოკლე',
			'max'               => 'პაროლი აღემატება 255 სიმბოლოს',
			'confirmed'         => 'პაროლი ერთმანეთს არ ემთხვევა',
			'current_password'  => 'პაროლი არასწორია',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [
		'email'    => 'ელ-ფოსტა',
		'username' => 'მომხმარებლის სახელი',
		'password' => 'პაროლი',
	],
];

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|max:255|exists:users,email',
            'password' => 'required|min:3|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'email.exists' => 'The provided email does not exist.',
        ];
    }
}

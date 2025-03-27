<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|min:3|max:255|confirmed',
        ];
    }
}

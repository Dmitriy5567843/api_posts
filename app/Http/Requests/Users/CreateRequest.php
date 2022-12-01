<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'password' => ['bail', 'required', 'string', 'min:3', 'max:30'],
        ];
    }
}

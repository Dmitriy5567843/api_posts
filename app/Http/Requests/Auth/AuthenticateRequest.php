<?php
declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AuthenticateRequest.
 *
 * @package App\Http\Requests\Auth
 * @author DaKoshin.
 */
class AuthenticateRequest extends FormRequest
{
    /**
     * Validation rules.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'bail|required|email|string|max:255',
            'password' => 'bail|required|string|min:8|max:32',
            'deviceName' => 'bail|required|string|max:255',
        ];
    }
}

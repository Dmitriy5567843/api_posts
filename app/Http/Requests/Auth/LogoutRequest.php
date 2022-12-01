<?php
declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LogoutRequest.
 *
 * @package App\Http\Requests\Auth
 * @author DaKoshin.
 */
class LogoutRequest extends FormRequest
{
    /**
     * Validation rules.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'tokenId' => 'bail|required|integer',
        ];
    }
}

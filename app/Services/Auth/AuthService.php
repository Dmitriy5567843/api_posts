<?php
declare(strict_types=1);

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\NewAccessToken;

/**
 * Class AuthService.
 *
 * @package App\Services\Auth
 * @author DaKoshin.
 */
final class AuthService
{
    /**
     * Authorize user by credentials.
     *
     * @param string $email
     * @param string $password
     * @param string $deviceName
     * @return NewAccessToken
     */
    public function authenticate(string $email, string $password, string $deviceName): NewAccessToken
    {
        $user = User::whereEmail($email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user->tokens()->delete();

        return $user->createToken($deviceName);
    }
}

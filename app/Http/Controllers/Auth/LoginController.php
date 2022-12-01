<?php


declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\DTO\SuccessAuthDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Http\Requests\Auth\LogoutRequest;
use App\Http\Resources\Auth\SuccessAuthResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController.
 *
 * @package App\Http\Controllers\Auth
 */
final class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param AuthenticateRequest $request
     * @param AuthService $authService
     * @return JsonResponse
     */
    public function authenticate(AuthenticateRequest $request, AuthService $authService): JsonResponse
    {
        $token = $authService->authenticate(
            $request->input('email'),
            $request->input('password'),
            $request->input('deviceName'),
        );

        $resource = new SuccessAuthResource(
            new SuccessAuthDTO($token->accessToken->id, $token->plainTextToken)
        );

        return $this->dataResponse($resource->toArray());
    }

    /**
     * Logout user.
     *
     * @param LogoutRequest $request
     * @return JsonResponse
     */
    public function logout(LogoutRequest $request): JsonResponse
    {
        Auth::user()->tokens()->delete((int) $request->input('tokenId'));

        return $this->successResponseWithoutContent();
    }

    /**
     * Logout user from all devices.
     *
     * @return JsonResponse
     */
    public function logoutFromAll(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return $this->successResponseWithoutContent();
    }
}

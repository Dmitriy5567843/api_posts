<?php

declare(strict_types=1);

namespace App\Http\Controllers\Users;


use App\DTO\CreateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Resources\Users\UserResource;
use App\Models\User;
use App\Services\Users\UsersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class UsersController.
 *
 * @package App\Http\Controllers\Users
 */
class UsersController extends Controller
{
    /**
     * Create user.
     *
     * @param  CreateRequest  $request
     * @param  UsersService  $usersService
     * @return JsonResponse
     */
    public function create(CreateRequest $request, UsersService $usersService): JsonResponse
    {
        $user = $usersService->create(
            new CreateUserDTO(
                $request->input('name'),
                $request->input('email'),
                $request->input('password'),
            )
        );

        return $this->dataResponse((new UserResource($user))->toArray());
    }

    /**
     * Ban user.
     *
     * @param  User  $user
     * @param  UsersService  $service
     * @return JsonResponse
     */
    public function ban(User $user, UsersService $service)
    {
        $service->ban($user);

        return $this->successResponseWithoutContent();
    }

    /**
     * Unban user.
     *
     * @param  User  $user
     * @param  UsersService  $service
     * @return JsonResponse
     */
    public function unban(User $user, UsersService $service)
    {
        $service->unban($user);

        return $this->successResponseWithoutContent();
    }

    /**
     * Return auth user info.
     *
     * @return JsonResponse
     */
    public function getMe(): JsonResponse
    {
        return $this->dataResponse((new UserResource(Auth::user()))->toArray());
    }

    /**
     * Set admin status for user.
     *
     * @param  User  $user
     * @param  UsersService  $service
     * @return JsonResponse
     */
    public function setAdmin(User $user, UsersService $service)
    {
        $service->setAdmin($user);

        return $this->successResponseWithoutContent();
    }

    /**
     * Delete admin status.
     *
     * @param  User  $user
     * @param  UsersService  $service
     * @return JsonResponse
     */
    public function delAdmin(User $user, UsersService $service)
    {
        $service->delAdmin($user);

        return $this->successResponseWithoutContent();
    }
}

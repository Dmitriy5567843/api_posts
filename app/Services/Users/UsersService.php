<?php

namespace App\Services\Users;

use App\DTO\CreateUserDTO;
use App\Exceptions\Users\BanDeniedException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersService.
 *
 * @package App\Services\Users
 */
class UsersService
{
    /**
     * Create user.
     *
     * @param  CreateUserDTO  $createUserDTO
     * @return User
     */
    public function create(CreateUserDTO $createUserDTO): User
    {
        return User::create([
            'name' => $createUserDTO->getName(),
            'email' => $createUserDTO->getEmail(),
            'password' => Hash::make($createUserDTO->getPassword()),
        ]);
    }

    /**
     * Ban user.
     *
     * @param  User  $user
     * @return User
     */
    public function ban(User $user): User
    {
        if ($user->is_admin) {
            throw new BanDeniedException();
        }

        $user->update([
            'is_banned' => true,
        ]);

        return $user;
    }

    /**
     * Unban user.
     *
     * @param  User  $user
     * @return User
     */
    public function unban(User $user): User
    {
        $user->update([
            'is_banned' => false,
        ]);

        return $user;
    }

    /**
     * Set admin.
     *
     * @param  User  $user
     * @return User
     */
    public function setAdmin(User $user): User
    {
        $user->update([
            'is_admin' => true,
        ]);

        return $user;
    }

    /**
     * Delete admin status.
     *
     * @param  User  $user
     * @return User
     */
    public function delAdmin(User $user): User
    {
        $user->update([
            'is_admin' => false,
        ]);

        return $user;
    }
}

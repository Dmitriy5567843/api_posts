<?php

declare(strict_types=1);

namespace App\Exceptions\Roles;

use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvalidRoleException.
 *
 * @package App\Exceptions\Roles
 */
final class InvalidRoleException extends InvalidArgumentException
{
    /**
     * InvalidRoleException constructor.
     */
    public function __construct()
    {
        parent::__construct(__('exceptions.roles.invalidRole'), Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}


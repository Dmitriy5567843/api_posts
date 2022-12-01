<?php

declare(strict_types=1);

namespace App\Exceptions\Users;

use LogicException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BanDeniedException.
 *
 * @package App\Exceptions\Users
 * @author DaKoshin.
 */
final class BanDeniedException extends LogicException
{
    /**
     * BanDeniedException constructor.
     */
    public function __construct()
    {
        parent::__construct('You do not have access for ban user.', Response::HTTP_FORBIDDEN);
    }
}

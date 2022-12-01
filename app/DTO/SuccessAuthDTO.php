<?php

declare(strict_types=1);

namespace App\DTO;

/**
 * Class SuccessAuthDTO.
 *
 * @package App\DTO
 */
final class SuccessAuthDTO
{
    /**
     * @var int Token id.
     */
    private int $id;

    /**
     * @var string Token.
     */
    private string $token;

    /**
     * SuccessAuthDTO constructor.
     *
     * @param int $id
     * @param string $token
     */
    public function __construct(int $id, string $token)
    {
        $this->id = $id;
        $this->token = $token;
    }

    /**
     * @return int
     * @see SuccessAuthDTO::$id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     * @see SuccessAuthDTO::$token
     */
    public function getToken(): string
    {
        return $this->token;
    }
}

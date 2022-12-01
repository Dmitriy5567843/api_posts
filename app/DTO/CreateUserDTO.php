<?php

declare(strict_types=1);

namespace App\DTO;

/**
 * Class CreateUserDTO.
 *
 * @package App\DTO
 * @author DaKoshin.
 */
final class CreateUserDTO
{
    /**
     * @var string name.
     */
    private string $name;

    /**
     * @var string email.
     */
    private string $email;

    /**
     * @var string password.
     */
    private string $password;

    /**
     * CreateUserDTO constructor.
     *
     * @param  string  $name
     * @param  string  $email
     * @param  string  $password
     */
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     * @see CreateUserDTO::$name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     * @see CreateUserDTO::$email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     * @see CreateUserDTO::$password
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}

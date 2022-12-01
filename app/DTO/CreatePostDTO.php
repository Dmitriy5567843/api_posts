<?php

namespace App\DTO;

final class CreatePostDTO
{
    /**
     * @var int
     */
    private int $user_id;
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string
     */
    private string $context;

    /**
     * CreatePostDTO constructor
     *
     * @param int $user_id
     * @param string $title
     * @param string $context
     */
    public function __construct(int $user_id, string $title, string $context)
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->context = $context;
    }


    /**
     * @return int
     * @see CreateUserDTO::$user_id
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }


    /**
     * @return string
     * @see CreateUserDTO::$title
     */
    public function getTitle(): string
    {
        return $this->title;
    }


    /**
     * @return string
     * @see CreateUserDTO::$context
     */
    public function getContext(): string
    {
        return $this->context;
    }
}


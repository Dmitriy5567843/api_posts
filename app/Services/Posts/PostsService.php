<?php

namespace App\Services\Posts;

use App\DTO\CreatePostDTO;
use App\Models\Post;

class PostsService
{


    /**
     * @param CreatePostDTO $createPostDTO
     * @return Post
     */
    public function store(CreatePostDTO $createPostDTO): Post
    {

        $authUserId = \auth()->user()->id;

        return Post::create([
            'user_id' => $authUserId,
            'title' => $createPostDTO->getTitle(),
            'context' => $createPostDTO->getContext(),
        ]);
    }

    /**
     * @param int $id
     * @return Post
     */
    public function update(int $id, CreatePostDTO $createPostDTO): Post
    {
        Post::where('id', $id)->update([
            'user_id' => $createPostDTO->getUserId(),
            'title' => $createPostDTO->getTitle(),
            'context' => $createPostDTO->getContext(),
        ]);

        return Post::where('id', $id)->first();
    }

    /**
     * @return Post
     */
    public function userPosts(): Post
    {
        $authUserId = \auth()->user()->id;
        $post = Post::where('user_id',$authUserId)->first();

        return $post;
    }
}

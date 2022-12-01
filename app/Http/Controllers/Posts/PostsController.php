<?php

namespace App\Http\Controllers\Posts;

use App\DTO\CreatePostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Http\Resources\Posts\PostCollection;
use App\Http\Resources\Posts\PostsResource;
use App\Models\Post;
use App\Services\Posts\PostsService;
use Illuminate\Http\JsonResponse;

class PostsController extends Controller
{
    private Post $postsService;

    public function __construct(PostsService $postsService)
    {
        $this->postsService = $postsService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->dataResponse((new PostsResource(Post::all()))->toArray());
    }

    /**
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request): JsonResponse
    {
        $authUserId = \auth()->user()->id;
        $post = $this->postsService->store(
            new CreatePostDTO(
                $request->input($authUserId),
                $request->input('title'),
                $request->input('context'),
            )
        );

        return $this->dataResponse((new PostsResource($post))->toArray());
    }

    public function show(int $id): JsonResponse
    {
        $posts = Post::findOrFail($id)->first();

        return $this->dataResponse((new PostsResource($posts))->toArray());
    }


    /**
     * @param UpdateRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id): JsonResponse
    {
        $this->postsService->update($id, $request->validated());

        return $this->successResponseWithoutContent();
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        Post::findOrFail($id)->delete();

        return $this->successResponseWithoutContent();
    }

    /**
     * @return JsonResponse
     */
    public function userPosts(): JsonResponse

    {
      $posts =  $this->postsService->userPosts();

        return $this->dataResponse((new PostCollection($posts))->toArray());

    }
}

<?php

namespace App\Http\Resources\Posts;

use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request = null): array
    {
        return [
            'id' => $this->id,
            'user_id' => UserResource::collection($this->user_id),
            'title' => $this->title,
            'context' => $this->context,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

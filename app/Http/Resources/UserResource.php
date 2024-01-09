<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'displayName' => $this->display_name,
            'tagName' => $this->tag_name,
            'bio' => $this->bio,
            'profile_picture' => $this->profile_picture,
            'location' => $this->location,
            'createdAt' => $this->created_at,
            // 'postsCollection' => PostResource::collection(Post::all()->where('user','=',$this->id)),
            'posts' => Post::all()->where('user','=',$this->id),
            // 'posts' => PostResource::collection($this->whenLoaded('posts'))
        ];
    }
}

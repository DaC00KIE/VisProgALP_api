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
            'username' => $this->username,
            'displayName' => $this->display_name,
            'password' => $this->password,
            'bio' => $this->bio,
            'profilePicture' => $this->profile_picture,
            'location' => $this->location,
            'createdAt' => $this->created_at,
            'posts' => $this->posts
        ];
    }
}

<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'caption' => $this->caption,
            'user' => $this->user
            // 'user' => new UserResource(User::find($this->user)),
            // 'user' => User::all()->where('id','=',$this->user)
        ];
    }
}

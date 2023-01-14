<?php

namespace App\Http\Resources\Api\V1\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'postId' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'coverText' => $this->cover_text,
            'cover' => $this->cover,
            'tags' => explode(',', $this->tags),
            'createdBy' => $this->creator['name'],
            'createdAt' => $this->created_at,
        ];
    }
}

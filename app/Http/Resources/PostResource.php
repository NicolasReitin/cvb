<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'author' => $this->author,
            'photo' => url($this->photo),
            'young_team_id' => $this->young_team_id,
            'senior_team_id' => $this->senior_team_id,
            'created_at' => $this->created_at,
        ];
    }
}

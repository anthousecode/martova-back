<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class News extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'is_published' => $this->is_published,
            'ru_name' => $this->ru_name,
            'ua_name' => $this->ua_name,
            'ru_description' => $this->ru_description,
            'ua_description' => $this->ua_description,
            'image' => \MediaManager::getFileLink($this->image),
            'likes_count' => $this->likes_count ?? 0,
            'comments_count' => $this->comments_count ?? 0,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

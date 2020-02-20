<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
            'news' => $this->news,
            'author' => $this->author,
            'text' => $this->text,
            'image' => sprintf("https://drive.google.com/uc?id=%s&export=download", $this->image),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

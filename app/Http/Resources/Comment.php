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
            'image' => $this->image ? sprintf("https://drive.google.com/uc?id=%s&export=download", $this->image) : '',
            'file_type' => $this->image ? ($this->file_type ? (!preg_match('/mp4/', $this->file_type) ? 'img' : 'video') : '') : '',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

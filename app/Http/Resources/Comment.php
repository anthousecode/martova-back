<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $fileType = '';
        if ($this->image) {
            if (Str::contains($this->file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
                $fileType = 'img';
            }
            if (Str::contains($this->file_type, ['mp4', 'avi', 'ogg', 'web', 'webm', 'mkv', 'flv', 'vob'])) {
                $fileType = 'video';
            }
        }
        return [
            'id' => $this->id,
            'news' => $this->news,
            'author' => $this->author,
            'text' => $this->text,
            'image' => \MediaManager::getFileLink($this->image),
            'image_type' => $fileType,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

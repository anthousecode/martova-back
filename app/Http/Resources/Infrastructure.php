<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Infrastructure extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => [
                'ru_name' => $this->category ? $this->ru_name : '',
                'ua_name' => $this->category ? $this->category->ua_name : '',
            ],
            'X' => $this->X,
            'Y' => $this->Y,
            'ru_name' => $this->ru_name,
            'ua_name' => $this->ua_name,
            'ru_description' => $this->ru_description,
            'ua_description' => $this->ua_description,
            'icon' => $this->icon,
            'timing' => $this->timing,
            'image' => sprintf("https://drive.google.com/uc?id=%s&export=download", $this->image),
            'video' => sprintf("https://drive.google.com/uc?id=%s&export=download", $this->video),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

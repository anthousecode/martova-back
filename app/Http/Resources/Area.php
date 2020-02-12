<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Area extends JsonResource
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
            'status' => $this->status,
            'otherInfo' => [
                'number' => $this->number,
                'cad_number' => $this->cad_number,
                'square' => $this->square,
                'price' => $this->price,
            ],
            'modelView' => [
                'polygon' => $this->polygon,
                'fill' => $this->color ?? $this->default_color,
                'stroke' => $this->stroke,
            ],
        ];
    }
}

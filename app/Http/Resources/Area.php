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
            'id' => $request->id,
            'status' => $request->status,
            'otherInfo' => [
                'number' => $request->number,
                'cad_number' => $request->cad_number,
                'square' => $request->square,
                'price' => $request->price,
            ],
            'modelView' => [
                'polygon' => $request->polygon,
                'fill' => $request->color ?? $request->default_color,
                'stroke' => $request->stroke,
            ],
        ];
    }
}

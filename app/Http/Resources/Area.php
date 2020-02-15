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
        $foo = explode(',', $this->polygon);
        $bar = [];
        $fooCount = count($foo);
        for ($i=0; $i<$fooCount; $i++) {
            if ($i%2==0) {
                $bar[] = [
                    'x' => $foo[$i], 'y' => (array_key_exists(($i+1), $foo)) ? $foo[$i+1] : 0,
                ];
            }
        }
        $this->polygon = json_encode($bar);
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
            'image' => sprintf("https://drive.google.com/uc?id=%s&export=download", $this->image),
//            'plan' => ,
//            'survey' => ,
        ];
    }
}

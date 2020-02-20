<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Resources\Gallery as GalleryResource;

class GalleryController extends Controller
{
    /**
     * @OA\Get(
     *  path="/gallery-items",
     *  operationId="galleryItems",
     *  tags={"All"},
     *  summary="Fetch all gallery items",
     *  @OA\Response(
     *    response=200,
     *    description="OK",
     *     @OA\MediaType(
     *        mediaType="application/json",
     *        @OA\Property(
     *           property="gallery_items",
     *           type="array",
     *           @OA\Items(),
     *           description="Whole bunch of gallery items"
     *         ),
     *     )
     *  )
     * )
     */
    public function fetchGalleryItems()
    {
        return \Cache::remember('all_gallry_items', 1440, function(){
            return GalleryResource::collection(Gallery::all());
        });
    }
}

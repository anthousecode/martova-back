<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

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
        return json_encode(['gallery_items' => Gallery::all()->toArray()]);
    }
}

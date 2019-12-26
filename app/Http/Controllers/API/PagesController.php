<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/page/{slug}",
     *     operationId="FindPageByUniqueSlug",
     *     summary="Find page by unique slug",
     *     tags={"All"},
     *     @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         description="Unique slug of page as string"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Property(
     *               property="pages",
     *               type="array",
     *               description="All pages",
     *               @OA\Items()
     *           )
     *         )
     *     )
     * )
     */
    public function getByUniqueTitle($slug = null)
    {
        return json_encode(['pages' => Page::where('slug', $slug)->get()->toArray()]);
    }

    /**
     * @OA\Get(
     *     path="/pages",
     *     operationId="fetchAllPages",
     *     summary="Get all custom pages",
     *     tags={"All"},
     *     @OA\Response(
     *        response=200,
     *        description="OK",
     *        @OA\MediaType(
     *          mediaType="application/json",
     *          @OA\Property(
     *             property="pages",
     *             type="array",
     *             description="All custom pages",
     *             @OA\Items()
     *           )
     *        )
     *     )
     * )
     */
    public function fetchPages()
    {
        return json_encode(['pages' => Page::orderBy('order', 'desc')->get()]);
    }
}

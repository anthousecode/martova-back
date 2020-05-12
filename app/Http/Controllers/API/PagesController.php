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
     *               property="page",
     *               type="array",
     *               description="All pages",
     *               @OA\Items()
     *           )
     *         )
     *     )
     * )
     */
    public function getByUniqueSlug($slug = null)
    {
	 $page = Page::where('slug', $slug)->first();
         
	 return json_encode(['page' => $page], JSON_UNESCAPED_UNICODE);
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
        $pages = Page::orderBy('order', 'asc')->get();
        
        return json_encode(['pages' => $pages], JSON_UNESCAPED_UNICODE);
    }
}

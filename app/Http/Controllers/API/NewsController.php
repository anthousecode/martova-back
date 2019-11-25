<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/news",
     *     operationId="FetchAllNews",
     *     summary="Get all news items",
     *     tags={"All"},
     *     @OA\Response(
     *       response=200,
     *       description="OK",
     *       @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Property(
     *              property="news",
     *              type="array",
     *              description="All news",
     *              @OA\Items()
     *          )
     *        )
     *     )
     * )
     */
    public function fetchNews()
    {
        return json_encode(['news' => News::all()->toArray()]);
    }
}

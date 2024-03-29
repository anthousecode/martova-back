<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsLike;
use App\Http\Resources\News as NewsResource;
use App\User;

class NewsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/news",
     *     operationId="FetchAllNews",
     *     summary="Get all news items with likes",
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
        $news = News::where('is_published', 1)->withCount(['likes', 'comments'])->get();

        return NewsResource::collection($news);
    }

    /**
     * @OA\Put(
     *  path="/news_like/{news_id}",
     *  operationId="LikeSpecificNews",
     *  summary="Authenticated user can set only 1 like for each news",
     *  tags={"All"},
     *  @OA\Parameter(
     *     name="news_id",
     *     in="path",
     *     description="news unique id"
     * ),
     *     @OA\Response(
     *     response=200,
     *     description="OK",
     *      @OA\MediaType(
     *      mediaType="application\json",
     *       @OA\Property(
     *         property="message",
     *         type="array",
     *         description="response message with http status code provided",
     *         @OA\Items()
     *       ),
     *      ),
     *     )
     * )
     */
    public function setLike($news_id, Request $request)
    {
        if ((!$news_id) || ($news_id == 'null') || ($news_id == 'undefined')) {
            return response()->json(['message' => 'No news found'], 404);
        }

        $clientToken = $request->token;

        $user_id = User::where('api_token', $clientToken)->first()->id;
        $news_id = intval($news_id);

        $newsLike = NewsLike::where([
            ['user_id', $user_id],
            ['news_id', $news_id],
        ])->first();
        if ($newsLike) {
            return  response()->json(['message' => 'Already liked'], 422);
        }

        NewsLike::create([
            'user_id' => $user_id,
            'news_id' => $news_id,
        ]);

        return response()->json(['message' => 'OK'], 200);
    }

}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\User;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * @OA\Post(
     *     path="/add_comment/{news_id}",
     *     operationId="addCommentToNewsEntity",
     *     tags={"All"},
     *     summary="Add comment to specific news entity",
     *      @OA\Parameter(
     *          name="news_id",
     *          in="path",
     *          description="News id, to which comment will be attached"
     *      ),
     *      @OA\Parameter(
     *          name="text",
     *          in="query",
     *          description="Comment contents"
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Property(
     *                 property="message",
     *                 type="array",
     *                 description="response message with status code provided",
     *                 @OA\Items(
     *                     type="string"
     *                )
     *             )
     *         )
     *     )
     * )
     */
    public function addComment($news_id, Request $request)
    {
        // post /add_comment/{news_id}
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $clientToken = $request->cookie('token');
        $userId = User::where('api_token', $clientToken)->first()->id;

        Comment::create([
            'news_id' => intval($news_id),
            'user_id' => $userId,
            'text' => $request->text,
        ]);

        return response()->json(['message' => 'OK'], 200);
    }

    /**
     * @OA\Get(
     *     path="/news_comments/{news_id}",
     *     operationId="GetCommentsByNews",
     *     summary="Get comments for specific news entity by news id",
     *     tags={"All"},
     *     @OA\Parameter(
     *         name="news_id",
     *         in="path",
     *         description="news id, by which comments will be fetched"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Property(
     *                 property="comments",
     *                 type="array",
     *                 description="Fetched comments",
     *                 @OA\Items(
     *
     *                )
     *             )
     *         )
     *     )
     * )
     */
    public function getComments($news_id)
    {
        $comments = Comment::where('news_id', intval($news_id))->with(['news', 'author'])->get();

        return response()->json(['data' => $comments], 200);
    }

    /**
     * @OA\Delete(
     *     path="/delete_comment/{comment_id}",
     *     operationId="DeleteComment",
     *     summary="Delete comment entity by its id",
     *     tags={"All"},
     *     @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Parameter(
     *             in="path",
     *             name="comment_id",
     *             description="Comment id for comment entity, that will be deleted"
     *         )
     *     ),
     *    @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Property(
     *                 property="message",
     *                 type="array",
     *                 description="response message with status code provided",
     *                 @OA\Items(
     *                     type="string"
     *                )
     *             )
     *         )
     *     )
     * )
     */
    public function deleteComment($comment_id)
    {
        Comment::where('comment_id', intval($comment_id))->delete();

        return response()->json(['message' => 'OK'], 200);
    }
}

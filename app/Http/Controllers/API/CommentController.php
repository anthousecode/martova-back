<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Comment as CommentResource;
use App\Services\Cloud\GoogleDrive;

class CommentController extends Controller
{
    protected $googleDrive;

    public function __construct(GoogleDrive $googleDrive)
    {
        $this->googleDrive = $googleDrive;
    }

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
        if (!$request->text) {
            $request->text = '_';
        }

        $clientToken = $request->token;
        $userId = User::where('api_token', $clientToken)->first()->id;

        $comment = Comment::create([
            'news_id' => intval($news_id),
            'user_id' => $userId,
            'text' => $request->text,
        ]);
        $image = $request->file('image') ?? null;
        if (!is_null($image)) {
            $this->googleDrive->storeFileOnAdminSaving('comments_images',
                $image,
                Comment::class,
                $comment->id,
                'image'
            );
            $comment->file_type = $image->getClientOriginalExtension();
            $comment->save();
        }

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

        return CommentResource::collection($comments);
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

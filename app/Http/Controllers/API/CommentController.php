<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\User;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function addComment($news_id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        $clientToken = base64_decode(Cookie::get('token'));
        $userId = User::where('api_token', $clientToken)->first()->id;

        Comment::create([
              'news_id' => intval($news_id),
              'user_id' => $userId,
              'text' => $request->text,
          ]);

        return response()->json(['message' => 'OK'], 200);
    }

    public function getComments($news_id)
    {
          $comments = Comment::where('news_id', intval($news_id))->with(['news', 'author'])->get();

          return response()->json(['data' => $comments], 200);
    }

    public function deleteComment($comment_id)
    {
        Comment::where('comment_id', intval($comment_id))->delete();

        return response()->json(['message' => 'OK'], 200);
    }
}

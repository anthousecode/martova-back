<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\User;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['news_id', 'user_id', 'text'];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id','id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

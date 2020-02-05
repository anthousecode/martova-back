<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class NewsLike extends Model
{
    protected $table = 'news_likes';

    protected $fillable = ['user_id', 'news_id'];

    public function newsSpecific()
    {
        return $this->belongsTo(News::class);
    }
}

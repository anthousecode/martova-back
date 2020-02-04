<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\NewsLike;

class News extends Model
{
    protected $table = "news";

    protected $fillable = ['created_at', 'updated_at'];

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d.m.y');
    }

    public function likes()
    {
        //return $this->hasMany(NewsLike::class, '');
    }
}

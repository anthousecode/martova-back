<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AreaStatus;

class Area extends Model
{
    protected $table = "areas";

    protected $guarded = ['id'];

    public function status()
    {
        return $this->belongsTo(AreaStatus::class);
    }
}

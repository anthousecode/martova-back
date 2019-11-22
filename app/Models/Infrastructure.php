<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryInfrastructure;

class Infrastructure extends Model
{
    protected $table = "infrastructures";

    public function category()
    {
        return $this->belongsTo(CategoryInfrastructure::class);
    }
}

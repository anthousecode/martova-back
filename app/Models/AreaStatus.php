<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class AreaStatus extends Model
{
    protected $table = 'area_statuses';

//    public function areas()
//    {
//        return $this->hasMany(Area::class, 'status_id');
//    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function shops() {
        return $this->belongsToMany(Shop::class); // 다대다의 관계를 정의하는 belongsToMany() 메서드
    }
}

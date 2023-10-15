<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    // 1대 다 많은 가게  (다) 이기에 복수형으로 작성 shops
    public function shops() {
        return $this->hasMany(Shop::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    public function area() {
        return $this->belongsTo(Area::class);
    }

    public function routes() {
        return $this->belongsToMany(Route::class); // 다대다의 관계를 정의하는 belongsToMany() 메서드
    }
}

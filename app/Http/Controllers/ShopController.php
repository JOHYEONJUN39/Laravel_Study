<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        // 1대다 관계 부모에서 자식을 불러올 때
        $shops = Area::find(1)->shops; // Area에서 정의한 shops()를 호출

        $area = Shop::find(3)->area; // Shop에서 정의한 area()를 호출

        // 다대다 관계에서 부모에서 자식을 불러올 때
        $routes = Shop::find(1)->routes()->get(); // Shop에서 정의한 routes()를 호출

        dd($routes);
    }
}

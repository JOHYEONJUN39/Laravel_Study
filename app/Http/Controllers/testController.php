<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index() {

        // Eloquent
        $values = Test::all();
        // 건수를 습득
        $count = Test::count();
        // id를 지정하면 그 id하나의 인스턴스를 반환
        $first = Test::findOrFail(1);
        // text가 bbb인 것을 습득
        $whereBBB = Test::where('text', '=', 'bbb')->get();


        // クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
        ->select('id', 'text')
        ->get();
        
        dd($values, $count, $first, $whereBBB, $queryBuilder);

        return view('tests.test', compact('values'));
    }
}

> 클라이언트에서 url을 입력하고
라우팅에서 컨트롤러에 엑세스하여
컨트롤러 내부의 모델을 사용하여 데이터베이스에서 정보를 습득하여
view에 전달하는 방식
> 

### routes/web.php

```php
use App\Http\Controllers\TestController;
// 'tests/test' url에 접속하면 TestController의 index메서드에 액세스하라는 의미
Route::get('tests/test', [TestController::class, 'index']);
```

### App/Http/Controllers/TestController.php

```php
// 사용할 모델을 불러온다.
use App\Models\Test;

class testController extends Controller
{
    public function index() {
				// Test::all();로 모든 정보를 습득해서 $values에 저장
        $values = Test::all();

        // dd($values); die + var_dump 처리를 정지시키며 변수의 내용을 확인
				// compact()로 전달하고싶은 변수를 넘긴다 (view에서 사용가능)
        return view('tests.test', compact('values'));
    }
}
```

### resources/views/tests/test.blade.php

```php
// view에서 넘겨받은 변수를 사용
@foreach($values as $value)
{{ $value->id }}<br>
{{ $value->text }}<br>
@endforeach
// 결과
// 1
// aaa
// 2
// bbb
```
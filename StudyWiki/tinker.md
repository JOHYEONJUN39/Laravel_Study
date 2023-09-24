## tinker란?

→ 명령어 입력으로 데이터를 보존・열람 가능

```php
php artisan tinker
```

---

> * Model을 인스턴스화
> 

```php
$test = new App\Models\Test;
```

> * text컬럼을 만들어 두었기에 추가 가능
> 

```php
$test→text = “aaa”;
```

> * 저장
> 

```php
$test→save();
```

> * 모두 표시
> 

```php
App\Models\Teest::all();
```

### 실습

```php
php artisan tinker
Psy Shell v0.11.21 (PHP 8.2.9 — cli) by Justin Hileman
> $test = new App\Models\Test;
= App\Models\Test {#6238}

> $test->text = "aaa";
= "aaa"

> $test->save();
= true

> App\Models\Test::all();
= Illuminate\Database\Eloquent\Collection {#6937
    all: [
      App\Models\Test {#7194
        id: 1,
        text: "aaa",
        created_at: "2023-09-25 05:07:55",
        updated_at: "2023-09-25 05:07:55",
      },
    ],
  }
```
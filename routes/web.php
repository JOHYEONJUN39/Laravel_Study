<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('tests/test', [TestController::class, 'index']);

// Route::get('shops', [ShopController::class, 'index']);


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('contacts')
->middleware(['auth'])
->controller(ContactFormController::class)
->name('contacts.')
->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/solution', 'solution')->name('solution');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
});

Route::prefix('solution')
->middleware(['auth'])
->controller(SolutionController::class)
->name('solution.')
->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::delete('/{id}/destroy', 'destroy')->name('destroy');
});

Route::post('/contact-forms/{contactForm}/comments', [CommentController::class, 'store']);
Route::delete('/contact-forms/{contactForm}/comments/{comment}/adopt', [CommentController::class, 'adopt'])->name('comments.adopt');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

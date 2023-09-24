<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('foo', function () {
    return 'Hello Laravel!';
});

// put 用於更新整列
// patch 用於更新狀態
// Route::match(['get','post'], '/', function ...) 用於只能 get, post 方法的路由

Route::match(['GET', 'POST'], 'match', function () {
//    這邊會出現 Error 419, 因為 Laravel 預設開啟 CSRF
//    所以要到 ../app/Http/kernel.php 註解掉 web -> CSRF
    dd('match');
});

Route::redirect('foo', 'view');

Route::view('view', 'welcome');


Route::get('user/{id}', function ($id) {
    return "Hello User $id";
});

Route::get('member/{id?}', function ($id = 11) {
    return "Hello Member $id";
});

// 可以把 id 的值做一個篩選
Route::get('posts/{id}', function ($id) {
    return "Hello Posts $id";
})->where('id', '[0-9]+');

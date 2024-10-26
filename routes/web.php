<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;      //追加
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);
// '/posts/create'にGetリクエストが来たら、PostControllerのcreateメソッドを実行する
// createはshowよりも上に書く必要がある(showにも当てはまってしまう条件のため、上から実行されることを考慮)

Route::get('/posts/{post}', [PostController::class ,'show']);
// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
// この時、{post}の部分がPostControllerのshowメソッドの引数になる
// 例えば/posts/1にアクセスした場合、PostControllerのshowメソッドの引数には1が入る

Route::post('/posts', [PostController::class, 'store']);
// '/posts'にPostリクエストが来たら、PostControllerのstoreメソッドを実行する


Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);





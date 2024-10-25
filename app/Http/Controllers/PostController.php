<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    // public function index(Post $post)
    {
        return view('posts.index')->
        with([
            'posts' => Post::get(),
            // 'posts' => $post->get(),
            'num' => 1,
            'name' => 'Yamada'
        ]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。

       //view('posts.index')は、resources/views/posts/index.blade.phpを指定している。
      //posts. =  "resources/views/posts"のディレクトリを指定している。
        //with(['posts' => $post->get()]); とは　データをビューに渡すためのメソッド
        //get()メソッドで、postsテーブルのレコードを全て取得し、ビューに渡している。
    }
}
?>
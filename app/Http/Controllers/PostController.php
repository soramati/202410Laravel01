<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // useする

class PostController extends Controller
{
    public function index(Post $post)
    // public function index(Post $post)
    {
        return view('posts.index')->
        with([
            'posts' => $post->getPaginateByLimit(),
            // 'posts' => Post::getPaginateByLimit(),
            //Postモデルのgetメソッドを使って、postsテーブルのレコードを全て取得し、ビューに渡している。
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
    /**
 * 特定IDのpostを表示する
 *
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse post view
 */
public function show(Post $post)
{
    return view('posts.show')->with(['post' => $post]);
 //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
}

public function create()
{
    return view('posts.create');
}

    

public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする

{
    $input = $request['post'];
    //viewから送られてきたnameが"post"フォームの内容をrequestで取得
    $post->fill($input)->save();
    //空だったPostインスタンスのプロパティを、受け取ったキーごとに上書きができます。
    //fillメソッドで、Postインスタンスのプロパティを一括で上書き
    
    //post.php のクラスでfillableを定義しないと、fillメソッドで一括上書きできない。個人的には使いにくそう
    
    
    return redirect('/posts/' . $post->id);
}

public function edit(Post $post)
{
    return view('posts.edit')->with(['post' => $post]);
}

public function update(PostRequest $request, Post $post)
{
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
}

}
?>
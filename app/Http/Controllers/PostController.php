<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 一覧表示のページ
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    // 新規投稿するフォームのページ
    public function create()
    {
        return view('posts.create');
    }

    // 新規投稿するPOST送信
    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.show', compact('post'))->with('message', '新規投稿しました！');
    }

    // 個別の表示ページ
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 既存のインスタンスを編集するフォームのあるページ
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 編集をPUT送信
    public function update(Request $request, Post $post)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);

        $post->title = $request->title;
        $post->content  = $request->content;
        $post->save();

        return redirect()->route('posts.show', compact('post'))->with('message', '内容を更新しました!');
    }

    // 既存のインスタンスに対するDELETE送信
    public function destroy(Post $post)
    {
        $post->delete();

        //return redirect('/posts');
        return redirect()->route('posts.index')->with('message', '削除しました');
    }
}

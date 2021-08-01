@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

<h1 class="mt-4">編集</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="/posts/{{ $post->id }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label for="exampleInputEmail1">タイトル</label><!-- 入力されたいタイトル/コンテンツが空白文字列の場合、インスタンスのタイトル/コンテンツをセットする。 -->
        <input type="text" class="form-control" aria-describedby="emailHelp" name="title"
            value="{{ old('title') == '' ? $post->title : old('title') }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">内容</label>
        <textarea class="form-control"
            name="content">{{ old('content') == '' ? $post->content : old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">更新する</button>
</form>

<a href="/posts/{{ $post->id }}">詳細ページへ</a> |
<a href="/posts">一覧画面へ</a>

@endsection
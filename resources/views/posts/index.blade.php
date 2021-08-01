@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

@if (session('message'))
<p class="mt-4">{{ session('message') }}</p>
@endif

<h1 class="mt-4">投稿一覧</h1>

@foreach($posts as $post)

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->content }}</p>

        <div class="d-flex" style="height: 36.4px;">
            <a href="/posts/{{ $post->id }}" class="btn btn-outline-primary">詳細</a>
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary">編集</a>
            <form action="/posts/{{ $post->id }}" method="POST"
                onsubmit="if(confirm('本当に削除しますか？')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-outline-danger">削除</button>
            </form>
        </div>
    </div>
</div>
@endforeach
<a href="/posts/create">新規作成</a>
@endsection
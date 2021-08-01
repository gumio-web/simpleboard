@extends('layouts.layouts')

@section('title', 'Simple Board')

@section('content')

@if (session('message'))
<p class="mt-4">{{ session('message') }}</p>
@endif

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->content }}</p>

        <div class="d-flex" style="height: 36.4px;">
            <button class="btn btn-outline-primary">詳細</button>
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary">編集</a>
            <form action="/posts/{{ $post->id }}" method="POST"
                onsubmit="if(confirm('本当に削除しますか？')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
    </div>
</div>

<a href="/posts/{{ $post->id }}/edit">編集ページへ</a> |
<a href="/posts">一覧ページへ</a>

@endsection
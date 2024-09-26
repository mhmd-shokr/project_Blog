@extends('layouts.app')

@section('content')

<div class="container">
    <h1>All Posts</h1>

    @if($posts->isEmpty())
        <p>No posts available.</p>
    @else
        @foreach($posts as $post)
            <div class="post">
                <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p>{{ Str::limit($post->body, 100) }}</p>
                <small>Posted by {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</small>
            </div>
            <hr>
        @endforeach
    @endif
</div>

@endsection
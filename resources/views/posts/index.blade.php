@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.9); /* شفافية خفيفة */
    }

    h1 {
        color: #2980b9;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .post {
        margin-bottom: 1.5rem;
        padding: 1rem;
        border: 1px solid #ecf0f1;
        border-radius: 5px;
        background-color: rgba(236, 240, 241, 0.8); /* شفافية خفيفة */
        transition: box-shadow 0.3s ease-in-out;
    }

    .post:hover {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
        color: #3291d1;
        margin: 0;
    }

    p {
        color: #34495e;
    }

    .btn {
        margin-top: 0.5rem;
        margin-right: 0.5rem;
    }
</style>

<div class="container">
    <h1>All Posts</h1>

    @if($posts->isEmpty())
        <p>No posts available.</p>
    @else
        @foreach($posts as $post)
            <div class="post">
                <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p>{{ Str::limit($post->body, 100) }}</p>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    @endif

    <div>
        <h2>Debugging Information:</h2>
        <pre>{{ var_dump($posts) }}</pre>
    </div>
</div>
@endsection
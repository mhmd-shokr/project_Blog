
@extends('layouts.app')

@section('content')
<style>
    .container {
        padding: 20px;
        border-radius: 10px;
        max-width: 1000px;
        margin: 0 auto;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #2980b9;
        text-align: center;
        margin-bottom: 20px;
    }

    p {
        font-size: 16px;
        line-height: 1.6;
        color: #34495e;
    }

    .btn-danger, .btn-primary {
        margin-top: 10px;
    }

    .comment {
        padding: 10px;
        background-color: rgba(236, 243, 252, 0.8);
        border-radius: 5px;
        margin-bottom: 10px;
    }

    small {
        display: block;
        margin-bottom: 10px;
        color: #7f8c8d;
    }

    form {
        margin-top: 20px;
    }

    form .form-group textarea {
        border: 1px solid #bdc3c7;
        border-radius: 5px;
        width: 100%;
        padding: 10px;
        resize: none; /* منع تغيير حجم منطقة النص */
    }

    hr {
        border-top: 1px solid #ecf0f1;
        margin: 20px 0;
    }

    .btn-edit {
        background-color: #2980b9;
        color: #fff;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        margin-top: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        display: inline-block;
        text-align: center;
        text-decoration: none;
    }

    .btn-edit:hover {
        background-color: #1f6d94;
    }
</style>

<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <small>Posted by {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</small>

    @if(auth()->check() && auth()->user()->id == $post->user_id)
        <a href="{{ route('post.edit', $post->id) }}" class="btn-edit">Edit Post</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا المنشور؟')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Post</button>
        </form>
    @endif

    <hr>

    <h3>Comments</h3>
    @if($post->comments->isEmpty())
        <p>No comments yet.</p>
    @else
        @foreach($post->comments as $comment)
            <div class="comment">
                <p>{{ $comment->comment }}</p>
                <small>by {{ $comment->user->name }} on {{ $comment->created_at->format('d M Y') }}</small>

                @if(auth()->check() && auth()->user()->id == $comment->user_id)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا التعليق؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                @endif
            </div>
            <hr>
        @endforeach
    @endif

    @auth
    <form action="{{ route('comment.store', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Add a comment:</label>
            <textarea name="comment" id="comment" rows="3" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endauth

    @guest
    <p>Please <a href="{{ route('login') }}">login</a> to comment.</p>
    @endguest
</div>
@endsection

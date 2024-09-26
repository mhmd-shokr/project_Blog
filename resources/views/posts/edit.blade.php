
@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;        
        background-color: #f4f6f9; 
    }

    .container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #2980b9;
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 2rem; 
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #2980b9;
    }

    .form-control {
        width: 100%;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 0.75rem;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease-in-out;
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #2980b9;
        outline: none;
        box-shadow: 0 0 5px rgba(41, 128, 185, 0.5);
    }

    .btn-success {
        background-color: #2980b9;
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
    }

    .btn-success:hover {
        background-color: #0b255f;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 1rem;
        margin-bottom: 1.5rem;
        border-radius: 5px;
        font-size: 1rem;
    }
</style>

<div class="container">
    <h1>Edit Post</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="form-group">
            <label for="body">Post Body</label>
            <textarea name="body" id="body" rows="5" class="form-control" required>{{ $post->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Post</button>
    </form>
</div>
@endsection

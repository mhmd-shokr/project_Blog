
@extends('layouts.app')

@section('content')
<style>
    .container {
        padding: 20px;
        max-width: 100%; /* استخدم عرض المتصفح بالكامل */
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
        color: #2980b9;
        margin-bottom: 20px;
    }

    .posts-container {
        display: flex;
        flex-wrap: wrap; /* السماح بالتفاف البوستات في الصفوف */
        justify-content: space-between; /* توزيع البوستات بالتساوي */
        gap: 20px; /* مسافة بين البوستات */
    }

    .post {
        background-color: rgba(236, 240, 241, 0.8); /* شفافية خفيفة */
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        box-sizing: border-box;
        flex: 1 1 30%; /* توزيع البوستات على 3 بوستات في الصف */
        min-width: 250px; /* أقل عرض للبوست */
    }

    .post:hover {
        transform: scale(1.02);
    }

    .post-title {
        color: #2980b9;
        text-decoration: none;
    }

    .post-title:hover {
        text-decoration: none;
        color: #08314d;
        transition: color 0.2s;
    }

    small {
        display: block;
        margin-top: 10px;
        color: #7f8c8d;
        font-size: 14px;
        font-weight: bold;
        transition: color 0.2s;
    }

    hr {
        border-top: 1px solid #ecf0f1;
        margin: 20px 0;
        transition: border-color 0.2s;
    }

    @media (max-width: 768px) {
        .post {
            flex: 1 1 45%; /* بوستين في الصف للشاشات المتوسطة */
        }
    }

    @media (max-width: 576px) {
        .post {
            flex: 1 1 100%; /* بوست واحد لكل صف للشاشات الصغيرة */
        }

    }
</style>

<div class="container">
    <h1>All Posts</h1>
    <div class="posts-container">
        @foreach($posts as $post)
            <div class="post">
                <h2>
                    <a href="{{ route('post.show', $post->id) }}" class="post-title">{{ $post->title }}</a>
                </h2>
                <p>{{ Str::limit($post->body, 150) }}</p>
                <small>Posted by {{ $post->user->name }} on {{ $post->created_at->format('d M Y') }}</small>
            </div>
        @endforeach
    </div>
</div>
@endsection
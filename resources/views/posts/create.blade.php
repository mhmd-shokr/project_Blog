{{-- 
@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;        
    }

    .container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #2980b9;
        text-align: center;
        margin-bottom: 1.5rem;
    }
    .form-group {
        margin-bottom: 1.5rem;
        width: 100%;
        display: flex;
    
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color:#2980b9 ;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease-in-out;
    }
    input{
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 0.5rem;
        width: 100%;
        margin-bottom: 1rem;
        transition: border-color 0.3s ease-in-out;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        line-height: 2;
        color: #34495e;
        font-family: 'Poppins', sans-serif;
    }
    .form-control:focus {
        border-color: #2980b9;
        outline: none;
        box-shadow: 0 0 5px rgba(41, 128, 185, 0.5);

    }

    .btn-success {
        background-color: #2980b9;
        color: white;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        font-weight: 600;
    }

    .btn-success:hover {
        background-color: #0b255f;
    }
</style>

<div class="container">
    <h1>Create New Post</h1>
    <form class="form" action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Post Title</label>
            <input autocapitalize=" off" type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="body">Post Body</label>
            <textarea autocapitalize=" off" name="body" id="body" rows="5" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;        
        background-color: #f4f6f9; /* إضافة لون خلفية لطيف */
    }

    .container {
        max-width: 900px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #2980b9;
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 2rem; /* زيادة حجم الخط */
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
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease-in-out;
        font-size: 1rem; /* حجم خط ثابت */
        line-height: 1.5; /* تحسين ارتفاع الخط */
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
    textarea{
        resize: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 0.5rem;
        width: 100%;
        height: 200px; 
        margin-bottom: 1rem;
        transition: border-color 0.3s ease-in-out;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        line-height: 2;
        color: #34495e;
        font-family: 'Poppins', sans-serif;
    }
</style>

<div class="container">
    <h1>Create New Post</h1>
    <form class="form" action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Post Title</label>
            <input autocapitalize="off" type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="body">Post Body</label>
            <textarea autocapitalize="off" name="body" id="body" rows="5" class="form-control" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
</div>
@endsection
{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px; /* عرض أقصى للحاوية */
        margin: 2rem auto; /* مركزي */
        padding: 2rem; /* إضافة مسافة داخلية */
        border-radius: 10px; /* زوايا مستديرة */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* ظل */
    }

    h1 {
        color: #2980b9; /* لون العنوان */
        text-align: center; /* توسيط العنوان */
        margin-bottom: 1.5rem; /* مسافة أسفل العنوان */
    }

    .form-group {
        margin-bottom: 1.5rem; /* مسافة أسفل كل عنصر */
    }

    .btn-success {
        background-color: #2980b9; /* لون الزر */
        color: white; /* لون النص */
        padding: 0.5rem 1rem; /* مسافة داخلية */
        border: none; /* إزالة الحدود */
        border-radius: 5px; /* زوايا مستديرة */
        cursor: pointer; /* تغيير شكل المؤشر عند المرور */
        transition: background-color 0.3s; /* تأثير عند تغيير اللون */
        width: 100%; /* جعل الزر بعرض كامل */
    }

    .btn-success:hover {
        background-color: #1f6d94; /* لون الزر عند المرور */
    }

    input {
        border: 1px solid #ccc; /* لون الحدود */
        border-radius: 5px; /* زوايا مستديرة */
        padding: 0.5rem; /* مسافة داخلية */
        width: 100%; /* عرض كامل */
        margin-bottom: 1rem; /* مسافة أسفل */
        transition: border-color 0.3s; /* تأثير عند تغيير لون الحدود */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* ظل */
    }

    input:focus {
        border-color: #2980b9; /* تغيير لون الحدود عند التركيز */
        outline: none; /* إزالة إطار التركيز الافتراضي */
    }

    .alert {
        background-color: #f8d7da; /* لون خلفية التنبيه */
        color: #721c24; /* لون النص */
        padding: 1rem; /* مسافة داخلية */
        border-radius: 5px; /* زوايا مستديرة */
        margin-bottom: 1rem; /* مسافة أسفل */
    }

    .alert-success {
        background-color: #d4edda; /* لون خلفية النجاح */
        color: #155724; /* لون النص */
    }
</style>

<div class="container">
    <h1>Register</h1>

    {{-- عرض الأخطاء إذا كانت موجودة --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- عرض رسالة نجاح التسجيل --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input autocomplete="off" type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input autocomplete="off" type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input autocomplete="off" type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input autocomplete="off" type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Register</button>
    </form>
</div>
@endsection
{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
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
        max-width: 600px; /* أقصى عرض للحاوية */
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

    .btn-primary {
        background-color: #2980b9; /* لون الزر */
        color: white; /* لون النص */
        padding: 0.5rem 1rem; /* مسافة داخلية */
        border: none; /* إزالة الحدود */
        border-radius: 5px; /* زوايا مستديرة */
        cursor: pointer; /* تغيير شكل المؤشر عند المرور */
        transition: background-color 0.3s; /* تأثير عند تغيير اللون */
        width: 100%; /* جعل الزر بعرض كامل */
    }

    .btn-primary:hover {
        background-color: #1f6d94; /* لون الزر عند المرور */
    }

    input {
        border: 1px solid #ccc; /* لون الحدود */
        border-radius: 5px; /* زوايا مستديرة */
        padding: 0.5rem; /* مسافة داخلية */
        width: 100%; /* عرض كامل */
        margin-bottom: 1rem; /* مسافة أسفل */
        transition: border-color 0.3s; /* تأثير عند تغيير لون الحدود */
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
        display: none; /* إخفاء التنبيه بشكل افتراضي */
    }
</style>

<div class="container">
    <h1>Login</h1>
    
    @if(session('error'))
        <div class="alert">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input autocomplete="off"  type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input  autocomplete="off" type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
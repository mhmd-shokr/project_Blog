{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'My Custom Blog') }}</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: #2c3e50;
            padding: 1rem;
            color: #fafafa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.05em;
            text-transform: uppercase
            font-weight: bold;
            color: rgb(255, 255, 255);
            text-decoration: none;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        .navbar .nav-links a {
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        font-size: 1rem;
        }
        .navbar .nav-links a:hover {
            color: #2171a7;
        }


        /* Content Container */
        .content-container {
            margin: 2rem auto;
            max-width: 2000px;
            display: flex;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
            justify-content: center;
        }

        h1, h2 {
            color: #2980b9;
            text-align: center;
        }

        /* Button */
        .btn {
            background-color: #2980b9;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
        }

        .btn:hover {
            background-color: #1f6d94;
        }

        /* Footer */
        .footer {
        color: #7f8c8d;
            text-align: center;
            padding: 1rem;
            width: 100%;
            position: relative;
            bottom: 0;
            display: flex;
            gap: 1rem;
            font-size: 0.8rem;
            justify-content: center;
        }
        span {
            color: #2980b9;
            font-size: xx-large
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('post.index') }}" class="logo"> <span>M.S</span> Blog</a>
            <ul class="nav-links">
                <li><a class="active" href="{{ route('post.index') }}">Home</a></li>
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
                @auth
                    <li><a href="{{ route('post.create') }}">Create Post</a></li>
                    <li>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="content-container">
        @yield('content')
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} M.S Blog. All rights reserved.</p>
    </footer>
</body>
</html>
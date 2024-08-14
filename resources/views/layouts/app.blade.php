<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20">
            <h1 class="text-3xl font-bold">@yield('header', 'DOH SYSTEM PORTAL MAIN')</h1>
            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-blue-400 hover:underline">Home</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-blue-400 hover:underline">Logout</button>
                </form>
            </nav>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 p-6">
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Dashboard</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('web_listings.create') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Create Web Listing</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('categories.index') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">View Categories</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('categories.create') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Create Category</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>

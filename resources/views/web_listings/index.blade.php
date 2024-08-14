<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Listings</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .header-content {
            text-align: center;
        }

        .header-logos {
            display: flex;
            justify-content: center;
            gap: 16px; /* Adjust spacing between logos as needed */
            margin-bottom: 16px;
        }

        /* Navigation adjustments */
        .header-nav {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 16px; /* Adjust spacing between navigation items as needed */
        }
    </style>
</head>
<body class="bg-green-900 text-white">
<header class="bg-green-800 p-5 relative">
        <div class="header-content">
            <div class="header-logos">
                <img src="{{ asset('Logo.png') }}" alt="Logo" class="w-20">
                <img src="{{ asset('Bagong Pilipinas.png') }}" alt="Logo" class="w-20">
                <img src="{{ asset('DOH Logo.png') }}" alt="Logo" class="w-20">
            </div>
            <h1 class="text-3xl font-bold">DOH SYSTEM PORTAL MAIN</h1>
        </div>
        <nav class="header-nav">
            @auth
                <a href="{{ route('dashboard') }}" class="text-green-400 hover:underline">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-green-400 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-green-400 hover:underline">Login</a>
            @endauth
        </nav>
    </header>

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Web Listings</h2>
        @foreach($categories as $category)
            <div class="mb-6">
                <h3 class="text-xl font-bold">{{ $category->name }}</h3>
                @foreach($category->webListings as $webListing)
                    <div class="bg-gray-800 p-4 rounded-lg shadow-lg mb-4">
                        <h4 class="text-lg font-semibold">{{ $webListing->title }}</h4>
                        <p>{{ $webListing->description }}</p>
                        <p class="text-sm text-gray-400">{{ $webListing->additional_details }}</p>
                        <a href="{{ $webListing->local_link }}" class="text-blue-400 hover:underline" target="_blank">Local Access</a> |
                        <a href="{{ $webListing->external_link }}" class="text-blue-400 hover:underline" target="_blank">External Access</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</body>
</html>

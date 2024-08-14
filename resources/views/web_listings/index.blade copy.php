<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Listings</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20">
            <h1 class="text-3xl font-bold">DOH SYSTEM PORTAL MAIN</h1>
            <nav class="space-x-4">
                <a href="{{ route('home') }}" class="text-blue-400 hover:underline">Home</a>
                <a href="{{ route('dashboard') }}" class="text-blue-400 hover:underline">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-blue-400 hover:underline">Logout</button>
                </form>
            </nav>
        </div>
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

<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Web Listings</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .dropdown-content {
            display: none;
        }
        .dropdown-content.show {
            display: block;
        }
        .dropdown-toggle .arrow {
            transition: transform 0.3s;
        }
        .dropdown-toggle .arrow.rotate {
            transform: rotate(180deg);
        }
        /* Center-align header contents */
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
                <!-- <img src="{{ asset('Bagong Pilipinas.png') }}" alt="Logo" class="w-20"> -->
                <img src="{{ asset('DOH Logo.png') }}" alt="Logo" class="w-20">
            </div>
            <h1 class="text-3xl font-bold">DOH SYSTEM PORTAL MAIN</h1>
        </div>
        <nav class="header-nav">
            @auth
                <!-- <a href="{{ route('dashboard') }}" class="text-green-400 hover:underline">Dashboard</a> -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-green-400 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-green-400 hover:underline">Login</a>
            @endauth
        </nav>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-green-800 p-6">
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="block p-2 bg-green-700 rounded hover:bg-green-600">Dashboard</a>
                    </li>
                    <!-- <li class="mb-4">
                        <a href="{{ route('categories.create') }}" class="block p-2 bg-green-700 rounded hover:bg-green-600">Create Category</a>
                    </li> -->
                    <li class="mb-4">
                        <a href="{{ route('web_listings.create') }}" class="block p-2 bg-green-700 rounded hover:bg-green-600">Create Category and Web Listing</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Web Listings by Category -->
            <section>
                <h2 class="text-2xl font-semibold mb-4">Web Listings by Category</h2>
                @forelse($categories as $category)
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-2 text-green-400">{{ $category->name }}</h3>
                        @if($category->webListings->isEmpty())
                            <p class="text-lg text-green-300">No web listings available for this category.</p>
                        @else
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($category->webListings as $listing)
                                    <div class="relative">
                                        <div class="dropdown-toggle cursor-pointer flex justify-between items-center p-4 bg-green-700 rounded hover:bg-green-600" onclick="toggleDropdown('dropdown-content-{{ $listing->id }}')">
                                            <span class="font-semibold text-green-300">{{ $listing->title }}</span>
                                            <svg class="arrow w-4 h-4 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                        <div id="dropdown-content-{{ $listing->id }}" class="dropdown-content bg-green-800 rounded p-4 mt-2 shadow-md">
                                            <p class="mt-2 text-green-200">{{ $listing->description }}</p>
                                            <p class="mt-2 text-sm text-green-400">Category: {{ $category->name }}</p>
                                            <a href="{{ $listing->local_link }}" class="block p-2 bg-green-600 text-white rounded hover:bg-green-700 mt-2">Local Link</a>
                                            <a href="{{ $listing->external_link }}" class="block p-2 bg-green-600 text-white rounded hover:bg-green-700 mt-2">External Link</a>
                                            <div class="mt-2 flex space-x-2">
                                                <a href="{{ route('web_listings.edit', $listing->id) }}" class="p-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>
                                                <form action="{{ route('web_listings.destroy', $listing->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="text-lg text-green-300">No categories available.</p>
                @endforelse
            </section>
        </main>
    </div>

    <script>
        function toggleDropdown(id) {
            var content = document.getElementById(id);
            var arrow = content.previousElementSibling.querySelector('.arrow');
            if (content.classList.contains('show')) {
                content.classList.remove('show');
                arrow.classList.remove('rotate');
            } else {
                content.classList.add('show');
                arrow.classList.add('rotate');
            }
        }
    </script>
</body>
</html>

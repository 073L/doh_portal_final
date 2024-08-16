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

        .header-content {
            text-align: center;
        }

        .header-logos {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .header-nav {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 16px;
        }

        .sidebar-nav a {
            display: block;
            padding: 10px;
            border-radius: 8px;
            background-color: #d1d5db; /* Light Gray */
            color: #1f2937; /* Dark Gray */
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar-nav a:hover {
            background-color: #a3a8b1; /* Slightly Darker Gray */
            color: #111827; /* Even Darker Gray */
        }

        .card {
            background-color: #ffffff; /* White */
            border: 1px solid #e2e8f0; /* Light gray border */
            border-radius: 8px;
           
            margin-bottom: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2f855a; /* Dark green */
            color: #ffffff; /* White */
            padding: 12px;
            border-radius: 8px 8px 0 0;
            cursor: pointer;
        }

        .card-body {
            display: none;
            padding: 12px;
            background-color: #ffffff; /* White */
            border-radius: 0 0 8px 8px;
        }

        .card-body.show {
            display: block;
        }

        .btn-primary {
            background-color: #2f855a; /* Dark green */
            color: white;
            border: 1px solid #2f855a;
        }

        .btn-primary:hover {
            background-color: #276749; /* Darker green */
            border: 1px solid #276749;
        }

        .btn-secondary {
            background-color: white;
            color: #2f855a;
            border: 1px solid #2f855a;
        }

        .btn-secondary:hover {
            background-color: #2f855a;
            color: white;
            border: 1px solid #2f855a;
        }

        .header-nav a,
        .header-nav button {
            color: #d1d5db; /* Gray */
            font-weight: bold;
            transition: color 0.3s;
        }

        .header-nav a:hover,
        .header-nav button:hover {
            color: #9ca3af; /* Darker gray */
        }

        .search-input,
        .search-button {
            border-radius: 8px;
        }

        .search-input {
            padding: 10px 15px;
            border: 1px solid #2f855a;
            background-color: #ffffff;
            color: #333333;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .search-input::placeholder {
            color: #a0aec0;
        }

        .search-input:focus {
            border-color: #38a169;
            box-shadow: 0 0 5px #38a169;
        }

        .search-button {
            background-color: #2f855a;
            color: white;
            border: none;
            padding: 10px 18px;
            margin-left: 8px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .search-button:hover {
            background-color: #276749;
        }
    </style>
</head>
<body class="bg-white text-black">
    <header class="bg-green-800 p-5 relative">
        <div class="header-content">
            <div class="header-logos">
                <img src="{{ asset('Logo.png') }}" alt="Logo" class="w-20">
                <!-- <img src="{{ asset('Bagong Pilipinas.png') }}" alt="Logo" class="w-20"> -->
                <img src="{{ asset('DOH Logo.png') }}" alt="Logo" class="w-20">
            </div>
            <h1 class="text-white text-3xl font-bold">DOH SYSTEM PORTAL MAIN</h1>
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
        <aside class="w-64 bg-gray-200 text-black-900 p-6">
            <nav class="sidebar-nav">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="block p-2 rounded">Dashboard</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('categories.create') }}" class="block p-2 rounded">Create Category</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('web_listings.create') }}" class="block p-2 rounded">Create Web Listing</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Web Listings by Category -->
            <section>
                <h2 class="text-2xl font-semibold mb-4 text-green-800">Web Listings by Category</h2>
                @forelse($categories as $category)
                    <div class="mb-8">
                        <h3 class="text-xl font-bold mb-2 text-green-800">{{ $category->name }}</h3>
                        @if($category->webListings->isEmpty())
                            <p class="text-lg text-green-600">No web listings available for this category.</p>
                        @else
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($category->webListings as $listing)
                                    <div class="relative card">
                                        <div class="card-header dropdown-toggle cursor-pointer flex justify-between items-center" onclick="toggleDropdown('dropdown-content-{{ $listing->id }}')">
                                            <span class="font-semibold text-white">{{ $listing->title }}</span>
                                            <svg class="arrow w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </div>
                                        <div id="dropdown-content-{{ $listing->id }}" class="dropdown-content card-body">
                                            <p class="mt-2 text-gray-800">{{ $listing->description }}</p>
                                            <p class="mt-2 text-sm text-gray-600">Category: {{ $category->name }}</p>
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
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('show');

            const arrow = dropdown.previousElementSibling.querySelector('.arrow');
            arrow.classList.toggle('rotate');
        }
    </script>
</body>
</html>

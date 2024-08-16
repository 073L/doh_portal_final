<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Web Listings</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
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
    </style>
</head>
<body class="bg-green-900 text-white">
<header class="bg-green-800 p-5 relative">
    <div class="header-content">
        <div class="header-logos">
            <img src="{{ asset('Logo.png') }}" alt="Logo" class="w-20">
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
    <main class="bg-white flex-1 p-6">
        <h2 class="text-black text-2xl font-semibold mb-4">Create New Web Listing</h2>
        <form action="{{ route('web_listings.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="category_id" class="block text-black">Category:</label>
                <select id="category_id" name="category_id" class="w-full p-2 rounded border border-gray-300 bg-gray-100 text-black" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-black">Title:</label>
                <input type="text" id="title" name="title" class="w-full p-2 rounded border border-gray-300 bg-gray-100 text-black" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-black">Description:</label>
                <textarea id="description" name="description" rows="4" class="w-full p-2 rounded border border-gray-300 bg-gray-100 text-black" required></textarea>
            </div>
            <div class="mb-4">
                <label for="additional_details" class="block text-black">Additional Details:</label>
                <textarea id="additional_details" name="additional_details" rows="4" class="w-full p-2 rounded border border-gray-300 bg-gray-100 text-black" required></textarea>
            </div>
            <div class="mb-4">
                <label for="local_link" class="block text-black">Local Link:</label>
                <input type="url" id="local_link" name="local_link" class="w-full p-2 rounded border border-gray-300 bg-gray-100 text-black" required>
            </div>
            <div class="mb-4">
                <label for="external_link" class="block text-black">External Link:</label>
                <input type="url" id="external_link" name="external_link" class="w-full p-2 rounded border border-gray-300 bg-gray-100 text-black" required>
            </div>
            <button type="submit" class="p-2 bg-green-500 text-white rounded hover:bg-green-600">Create Web Listing</button>
        </form>
    </main>
</div>

<script>
    function toggleDropdown(id) {
        var content = document.getElementById(id);
        var arrow = content.previousElementSibling.querySelector('.arrow');
        content.classList.toggle('show');
        arrow.classList.toggle('rotate');
    }
</script>
</body>
</html>

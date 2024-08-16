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
            gap: 16px;
            margin-bottom: 16px;
        }

        /* Navigation adjustments */
        .header-nav {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 16px;
        }

        /* Sidebar styling */
        .sidebar-nav a {
            display: block;
            padding: 10px;
            border-radius: 8px;
            background-color: #d1d5db;
            color: #1f2937;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar-nav a:hover {
            background-color: #a3a8b1;
            color: #111827;
        }

        /* Extend sidebar height */
        .sidebar {
            height: 100vh; /* Full viewport height */
            position: fixed; /* Fix the sidebar in place */
        }

        .content {
            margin-left: 16rem; /* Align content with the sidebar */
        }

        /* Form styling */
        form {
            background-color: #ffffff;
            color: #2f855a;
        }
        form input {
            background-color: #f7fafc;
            border-color: #cbd5e0;
            color: #2f855a;
        }
        form input:focus {
            border-color: #38a169;
            box-shadow: 0 0 5px #38a169;
        }
        form button {
            background-color: #2f855a;
            color: white;
        }
        form button:hover {
            background-color: #276749;
        }

        /* Success message styling */
        .success-message {
            background-color: #2f855a;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-green-800 p-5 relative text-white">
        <div class="header-content">
            <div class="header-logos">
                <img src="{{ asset('Logo.png') }}" alt="Logo" class="w-20">
                <img src="{{ asset('DOH Logo.png') }}" alt="Logo" class="w-20">
            </div>
            <h1 class="text-3xl font-bold">DOH SYSTEM PORTAL MAIN</h1>
        </div>
        <nav class="header-nav">
            @auth
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
        <aside class="sidebar w-64 bg-gray-200 text-black-900 p-6">
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
        <main class="content flex-1 p-6">
            <form action="{{ route('categories.store') }}" method="POST" class="p-6 rounded-lg shadow-lg">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-green-600">Category Name:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 rounded border focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300" required>
                </div>
                <button type="submit" class="p-2 rounded hover:bg-green-700 transition-all duration-300">Create Category</button>
            </form>

            <!-- Display Success Message -->
            @if(session('success'))
                <div class="success-message p-4 rounded mt-6">
                    {{ session('success') }}
                </div>
            @endif
        </main>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Web Listings</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Custom styles for card layout and theme */
        .card {
            background-color: #ffffff; /* White background */
            border: 1px solid #e2e8f0; /* Light gray border */
            border-radius: 8px;
            
            margin: 12px; /* Added margin */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%; /* Set default width */
            max-width: 400px; /* Add a maximum width */
            margin-left: auto; /* Center the card horizontally */
            margin-right: auto; /* Center the card horizontally */
        }

        .card-header {
            display: flex; /* Use flexbox for alignment */
            justify-content: space-between; /* Space between title and arrow icon */
            align-items: center; /* Center-align items vertically */
            font-size: 1.125rem; /* Reduced font size */
            font-weight: 600;
            cursor: pointer;
            color: #ffffff; /* White text */
            background-color: #2f855a; /* Dark green background for header */
            padding: 12px; /* Match padding with card */
            border-radius: 8px 8px 0 0; /* Rounded corners only on the top */
        }

        .card-body {
            display: none;
            margin-top: 12px; /* Reduced margin */
            background-color: #f7fafc; /* Light gray background for body */
            padding: 12px; /* Match padding with card */
            border-radius: 0 0 8px 8px; /* Rounded corners only on the bottom */
        }

        .card-body.show {
            display: block;
        }

        .arrow-icon {
            transition: transform 0.3s ease; /* Smooth transition */
        }

        .arrow-icon.rotate {
            transform: rotate(180deg); /* Rotate the arrow icon */
        }

        /* Additional styles for column-container */
        .column-container {
            position: relative;
        }

        .listing-card {
            background-color: #f7fafc; /* Light gray background */
            border: 1px solid #e2e8f0; /* Light gray border */
            border-radius: 8px;
            padding: 8px; /* Reduced padding */
            margin-bottom: 12px; /* Reduced margin-bottom */
            text-align: center; /* Center-align text and button */
            color: #333333; /* Dark text color for readability */
        }

        .listing-card h4 {
            font-size: 1rem; /* Slightly reduced font size */
            font-weight: 600;
            margin-bottom: 4px; /* Reduced margin below heading */
        }

        .listing-card p {
            margin-top: 4px; /* Reduced margin */
            background-color: #e2e8f0; /* Light gray background */
            padding: 6px; /* Reduced padding */
            border-radius: 4px;
            border: 1px solid #cbd5e0; /* Slightly darker gray border */
            font-size: 0.875rem; /* Smaller font size */
        }

        .btn {
            display: inline-block;
            padding: 6px 12px; /* Reduced padding */
            border-radius: 4px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            margin-top: 8px;
            text-decoration: none;
            font-size: 0.875rem; /* Smaller font size */
        }

        .btn-primary {
            background-color: #2f855a; /* Dark green background */
            color: white;
            border: 1px solid #2f855a;
        }

        .btn-primary:hover {
            background-color: white;
            color: #2f855a;
            border: 1px solid #2f855a;
        }

        .btn-secondary {
            background-color: white; /* White background */
            color: #2f855a;
            border: 1px solid #2f855a;
        }

        .btn-secondary:hover {
            background-color: #2f855a;
            color: white;
            border: 1px solid #2f855a;
        }

        /* Center-align See More button */
        .listing-card .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 8px; /* Reduced margin-top */
        }

        /* Grid layout adjustments */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Adjust columns to fit content */
            gap: 16px;
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

        /* Search bar styles */
        .search-bar {
            display: flex;
            justify-content: center;
            margin: 16px 0;
        }

        .search-input {
            width: 100%;
            max-width: 500px;
            padding: 10px 15px; /* Increased padding for a more comfortable feel */
            border-radius: 8px;
            border: 1px solid #2f855a;
            font-size: 1rem;
            background-color: #ffffff; /* White background for input */
            color: #333333; /* Dark text color */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition effects */
        }

        .search-input::placeholder {
            color: #a0aec0; /* Light gray placeholder text */
        }

        .search-input:focus {
            outline: none;
            border-color: #38a169; /* Slightly brighter green border on focus */
            box-shadow: 0 0 5px #38a169; /* Subtle green glow on focus */
        }

        .search-button {
            background-color: #2f855a;
            color: white;
            border: none;
            padding: 10px 18px; /* Matching the padding of the input field */
            margin-left: 8px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center; /* Center the button content */
            justify-content: center; /* Center the button content */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition effects */
        }

        .search-button:hover {
            background-color: #276749; /* Darker green on hover */
        }

        .search-button svg {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Header -->
    <header class="bg-green-800 p-5 relative">
        <div class="header-content">
            <div class="header-logos">
                <img src="{{ asset('Logo.png') }}" alt="Logo" class="w-20">
                <!-- <img src="{{ asset('Bagong Pilipinas.png') }}" alt="Logo" class="w-20"> -->
                <img src="{{ asset('DOH Logo.png') }}" alt="Logo" class="w-20">
            </div>
            <h1 class="text-3xl font-bold text-white">DOH SYSTEM PORTAL</h1>
        </div>
        <nav class="header-nav">
            @auth
                <a href="{{ route('dashboard') }}" class="text-green-400 hover:underline">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-green-400 hover:underline">Logout</button>
                </form>
            @else
                <a href="{{ route('home') }}" class="text-green-400 hover:underline">Home</a>
                <!-- <a href="{{ route('login') }}" class="text-green-400 hover:underline">Login</a> -->
            @endauth
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-8 p-4">
        <h2 class="text-3xl font-semibold mb-4 text-center">Welcome to the Portal</h2>
        <div class="text-center">
            <p class="text-lg">Explore web listings and manage your resources effectively.</p>
        </div>
        <div >
            <!-- Search Bar -->
            <div class="search-bar">
                <form action="{{ route('search') }}" method="GET" class="flex">
                    <input type="text" name="query" placeholder="Search..." class="search-input" value="{{ request('query') }}">
                    <button type="submit" class="search-button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Display categories and web listings -->
            <h2 class="text-2xl font-semibold mb-4 text-green-800">Web Listings by Category</h2>
            @forelse($categories as $category)
                <div class="mb-8">
                    <h3 class="text-xl font-bold mb-2 text-green-800">{{ $category->name }}</h3>
                    @if($category->webListings->isEmpty())
                        <p class="text-lg text-green-600">No web listings available for this category.</p>
                    @else
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($category->webListings as $listing)
                                <div class="relative column-container">
                                    <div class="card">
                                        <div class="card-header dropdown-toggle cursor-pointer flex justify-between items-center" onclick="toggleDropdown('dropdown-content-{{ $listing->id }}', this)">
                                            <span class="font-semibold">{{ $listing->title }}</span>
                                            <svg class="arrow-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                        <div id="dropdown-content-{{ $listing->id }}" class="dropdown-content card-body">
                                            <p class="mt-2 text-gray-800">{{ $listing->description }}</p>
                                            <p class="mt-2 text-sm text-gray-600">Category: {{ $category->name }}</p>
                                            <div class="mt-2 flex space-x-2">
                                                <a href="{{ $listing->local_link }}" class="btn btn-primary">Local Link</a>
                                                <a href="{{ $listing->external_link }}" class="btn btn-secondary">External Link</a>
                                            </div>
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
        </div>
    </main>

    <script>
        function toggleDropdown(id, element) {
            const columnContainer = element.closest('.column-container');
            const allDropdownsInColumn = columnContainer.querySelectorAll('.dropdown-content');
            const allArrowsInColumn = columnContainer.querySelectorAll('.arrow-icon');
            
            allDropdownsInColumn.forEach(dropdown => {
                if (dropdown.id === id) {
                    dropdown.classList.toggle('show');
                } else {
                    dropdown.classList.remove('show');
                }
            });

            allArrowsInColumn.forEach(arrow => {
                if (arrow.parentElement.nextElementSibling.id === id) {
                    arrow.classList.toggle('rotate');
                } else {
                    arrow.classList.remove('rotate');
                }
            });
        }
    </script>
</body>
</html>

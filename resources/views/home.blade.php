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
            background-color: #2f855a; /* Dark green background */
            border: 1px solid #276749; /* Border color */
            border-radius: 8px;
            padding: 12px; /* Reduced padding */
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
            color: #e6fffa; /* Light green text */
        }

        .card-body {
            display: none;
            margin-top: 12px; /* Reduced margin */
        }

        .card-body.open {
            display: block;
        }

        .listing-card {
            background-color: #276749; /* Darker green background */
            border: 1px solid #2f855a; /* Border color */
            border-radius: 8px;
            padding: 8px; /* Reduced padding */
            margin-bottom: 12px; /* Reduced margin-bottom */
            text-align: center; /* Center-align text and button */
            color: #e6fffa; /* Light green text */
        }

        .listing-card h4 {
            font-size: 1rem; /* Slightly reduced font size */
            font-weight: 600;
            margin-bottom: 4px; /* Reduced margin below heading */
        }

        .listing-card p {
            margin-top: 4px; /* Reduced margin */
            background-color: #22543d; /* Darkest green background */
            padding: 6px; /* Reduced padding */
            border-radius: 4px;
            border: 1px solid #2f855a;
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
            grid-template-columns: 1fr; /* Single column layout */
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

        .arrow-icon {
            transition: transform 0.3s ease; /* Smooth transition */
        }

        /* Search bar styles */
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
    background-color: #22543d; /* Dark green background to match the theme */
    color: #e6fffa; /* Light green text color */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition effects */
}

.search-input::placeholder {
    color: #9ae6b4; /* Light green placeholder text */
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
<body class="bg-green-900 text-white">
    <!-- Header -->
    <header class="bg-green-800 p-5 relative">
        <div class="header-content">
            <div class="header-logos">
                <img src="{{ asset('Logo.png') }}" alt="Logo" class="w-20">
                <!-- <img src="{{ asset('Bagong Pilipinas.png') }}" alt="Logo" class="w-20"> -->
                <img src="{{ asset('DOH Logo.png') }}" alt="Logo" class="w-20">
            </div>
            <h1 class="text-3xl font-bold">DOH SYSTEM PORTAL</h1>
        </div>
        <nav class="header-nav">
            
            @auth
                <a href="{{ route('dashboard') }}" class="text-green-400 hover:underline">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-green-400 hover:underline">Logout</button>
                </form>
            @else
            <a href="{{ route('home') }}" class="text-green-400 hover:underline">home</a>
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
<div class="bg-green-700">
    <!-- Search Bar -->
    <div class="search-bar">
        <form action="{{ route('search') }}" method="GET" class="flex items-center">
            <input type="text" name="query" placeholder="Search categories or web listings..." 
                class="search-input focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-300">
            <button type="submit" class="search-button hover:bg-green-700 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </form>
    </div>
        <!-- Display categories and web listings -->
        <div class="mt-8 grid-container">
            @forelse($categories as $category)
                <div class="card">
                    <h3 class="card-header" onclick="toggleCategory('{{ $category->id }}')">
                        {{ $category->name }}
                        <svg class="arrow-icon w-4 h-4 text-green-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </h3>
                    <div id="category-details-{{ $category->id }}" class="card-body">
                        @forelse($category->webListings as $listing)
                            <div class="listing-card">
                                <h4>{{ $listing->title }}</h4>
                                <p>{{ $listing->description }}</p>
                                <div class="btn-container">
                                    <button class="btn btn-primary" onclick="toggleDetails('{{ $listing->id }}')">See More</button>
                                </div>
                                <div id="details-{{ $listing->id }}" class="hidden mt-4">
                                    <p>{{ $listing->additional_details }}</p>
                                    <a href="{{ $listing->local_link }}" class="btn btn-secondary">Local Access</a>
                                    <a href="{{ $listing->external_link }}" class="btn btn-primary">External Access</a>
                                </div>
                            </div>
                        @empty
                            <p>No web listings available.</p>
                        @endforelse
                    </div>
                </div>
            @empty
                <p>No categories available.</p>
            @endforelse
        </div>
</div>
         
    </main>

    <script>
        function toggleCategory(id) {
            const details = document.getElementById('category-details-' + id);
            const arrowIcon = details.previousElementSibling.querySelector('.arrow-icon');
            details.classList.toggle('open');
            arrowIcon.classList.toggle('rotate-180');
        }

        function toggleDetails(id) {
            const details = document.getElementById('details-' + id);
            details.classList.toggle('hidden');
        }
    </script>
</body>
</html>

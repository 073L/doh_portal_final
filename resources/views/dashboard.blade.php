<!-- resources/views/your_view.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Web Listings</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-5">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20">
            <h1 class="text-3xl font-bold">DOH SYSTEM PORTAL MAIN</h1>
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
                        <a href="{{ route('web_listings.create') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Create Web Listing</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('categories.create') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Create Category</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="block p-2 bg-gray-700 rounded hover:bg-gray-600">Dashboard</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Web Listing Creation Form -->
            <section>
                <h2 class="text-2xl font-semibold mb-4">Create New Web Listing</h2>
                <form action="{{ route('web_listings.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    @csrf
                    <div class="mb-4">
                        <label for="category_id" class="block text-gray-300">Category:</label>
                        <select id="category_id" name="category_id" class="w-full p-2 rounded border border-gray-600 bg-gray-900 text-white" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="block text-gray-300">Title:</label>
                        <input type="text" id="title" name="title" class="w-full p-2 rounded border border-gray-600 bg-gray-900 text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-300">Description:</label>
                        <textarea id="description" name="description" rows="4" class="w-full p-2 rounded border border-gray-600 bg-gray-900 text-white" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="additional_details" class="block text-gray-300">Additional Details:</label>
                        <textarea id="additional_details" name="additional_details" rows="4" class="w-full p-2 rounded border border-gray-600 bg-gray-900 text-white" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="local_link" class="block text-gray-300">Local Link:</label>
                        <input type="url" id="local_link" name="local_link" class="w-full p-2 rounded border border-gray-600 bg-gray-900 text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="external_link" class="block text-gray-300">External Link:</label>
                        <input type="url" id="external_link" name="external_link" class="w-full p-2 rounded border border-gray-600 bg-gray-900 text-white" required>
                    </div>
                    <button type="submit" class="p-2 bg-green-500 text-white rounded hover:bg-green-600">Create Web Listing</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
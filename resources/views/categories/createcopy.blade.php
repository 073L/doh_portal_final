<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-green-900 text-white">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Create New Category</h2>

        <!-- Form Section -->
        <form action="{{ route('categories.store') }}" method="POST" class="bg-green-800 p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-green-300">Category Name:</label>
                <input type="text" id="name" name="name" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
            </div>
            <button type="submit" class="p-2 bg-green-500 text-white rounded hover:bg-green-600">Create Category</button>
        </form>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mt-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display New Category -->
        <!-- @if(session('category'))
            <div class="bg-green-800 p-4 rounded mt-6">
                <h3 class="text-xl font-semibold">New Category Created:</h3>
                <p class="mt-2">Name: {{ session('category')->name }}</p>
            </div>
        @endif -->
    </div>
</body>
</html>

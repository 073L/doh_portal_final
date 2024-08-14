<!-- resources/views/web_listings/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Web Listing</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-green-900 text-white">
    <div class="container mx-auto p-6">
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

        <h2 class="text-2xl font-semibold mb-4">Create New Web Listing</h2>
        <form action="{{ route('web_listings.store') }}" method="POST" class="bg-green-800 p-6 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="category_id" class="block text-green-300">Category:</label>
                <select id="category_id" name="category_id" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-green-300">Title:</label>
                <input type="text" id="title" name="title" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-green-300">Description:</label>
                <textarea id="description" name="description" rows="4" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required></textarea>
            </div>
            <div class="mb-4">
                <label for="additional_details" class="block text-green-300">Additional Details:</label>
                <textarea id="additional_details" name="additional_details" rows="4" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required></textarea>
            </div>
            <div class="mb-4">
                <label for="local_link" class="block text-green-300">Local Link:</label>
                <input type="url" id="local_link" name="local_link" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
            </div>
            <div class="mb-4">
                <label for="external_link" class="block text-green-300">External Link:</label>
                <input type="url" id="external_link" name="external_link" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
            </div>
            <button type="submit" class="p-2 bg-green-500 text-white rounded hover:bg-green-600">Create Web Listing</button>
        </form>
    </div>
</body>
</html>

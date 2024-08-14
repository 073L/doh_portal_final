<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Web Listing</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-green-900 text-white">
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Web Listing</h2>
        <form action="{{ route('web_listings.update', $webListing->id) }}" method="POST" class="bg-green-800 p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="category_id" class="block text-green-300">Category:</label>
                <select id="category_id" name="category_id" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $webListing->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-green-300">Title:</label>
                <input type="text" id="title" name="title" value="{{ $webListing->title }}" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-green-300">Description:</label>
                <textarea id="description" name="description" rows="4" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>{{ $webListing->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="additional_details" class="block text-green-300">Additional Details:</label>
                <textarea id="additional_details" name="additional_details" rows="4" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>{{ $webListing->additional_details }}</textarea>
            </div>
            <div class="mb-4">
                <label for="local_link" class="block text-green-300">Local Link:</label>
                <input type="url" id="local_link" name="local_link" value="{{ $webListing->local_link }}" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
            </div>
            <div class="mb-4">
                <label for="external_link" class="block text-green-300">External Link:</label>
                <input type="url" id="external_link" name="external_link" value="{{ $webListing->external_link }}" class="w-full p-2 rounded border border-green-600 bg-green-900 text-white" required>
            </div>
            <button type="submit" class="p-2 bg-green-500 text-white rounded hover:bg-green-600">Update Web Listing</button>
        </form>
    </div>
</body>
</html>

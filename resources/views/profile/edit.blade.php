<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-black text-white">
    <header class="text-center p-5">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto">
        <h1 class="text-3xl mt-4">Edit Profile</h1>
        <nav>
            <a href="{{ route('dashboard') }}" class="text-blue-500">Dashboard</a>
        </nav>
    </header>
    <main class="container mx-auto px-4">
        <div class="mt-5">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <label for="name" class="block">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full p-2">
                </div>
                <div class="mt-4">
                    <label for="email" class="block">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full p-2">
                </div>
                <div class="mt-4">
                    <label for="password" class="block">Password (leave blank to keep current password)</label>
                    <input type="password" name="password" id="password" class="w-full p-2">
                </div>
                <div class="mt-4">
                    <label for="password_confirmation" class="block">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2">
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-light-green text-black p-2">Update Profile</button>
                </div>
            </form>
            <form action="{{ route('profile.destroy') }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white p-2">Delete Profile</button>
            </form>
        </div>
    </main>
</body>
</html>

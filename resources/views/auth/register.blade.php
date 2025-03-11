<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-6">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    autocomplete="name"
                    class="block w-full mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white" />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="username"
                    class="block w-full mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white" />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block w-full mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white" />
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block font-medium text-gray-700 dark:text-gray-300">Confirm
                    Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password"
                    class="block w-full mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white" />
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('login') }}"
                    class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Already registered?</a>

                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
            </div>
        </form>
    </div>
</body>

</html>

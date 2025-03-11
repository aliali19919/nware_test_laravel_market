<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-md">
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-6">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="username"
                    class="block w-full mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white" />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full mt-1 p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white" />
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">Forgot your password?</a>
                @endif

                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Log
                    in</button>
            </div>
        </form>
    </div>
</body>

</html>

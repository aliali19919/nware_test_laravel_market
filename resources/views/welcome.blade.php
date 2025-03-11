<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col items-center min-h-screen">
    <header class="fixed top-0 left-0 w-full bg-white dark:bg-gray-900 shadow-md py-4 px-6 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-lg font-semibold dark:text-white">Market App</a>
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline btn-sm dark:text-white">Mange Market</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline btn-sm dark:text-white">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>



    <main class="mt-20 w-full flex flex-col items-center">
        <div class="card w-96 bg-white dark:bg-gray-800 shadow-xl my-[100px] p-[50px] text-center  ">
            <h1 class="text-3xl font-bold dark:text-white text-center">
                Welcome to Market Dashboard 🚀
            </h1>
            <p class=" font-mono dark:text-gray-300 text-xl my-[20px]"> Manage your Market Easily 🛍️📈</p>
            <div class="mt-4 flex justify-center gap-4">
                <a href="{{ route('register') }}"
                    class="btn btn-primary p-[30px] w-full font-mono text-xl rounded-lg transition-all duration-300 hover:scale-110">Get
                    Started</a>

            </div>
        </div>
    </main>

</body>

</html>

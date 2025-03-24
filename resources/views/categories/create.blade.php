<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    @include('layouts.navigation')

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <form action="{{ route('categories.store') }}" method="POST"
            class="bg-white p-[50px] rounded-2xl shadow-xl w-96 border border-gray-200">
            @csrf
            <h2 class="text-2xl font-mono font-bold text-center my-[30px]">Create Category</h2>
            <input type="text" name="category" id="category"
                class=" rounded-lg w-full mb-[10px] transition-all duration-300 focus:ring-2 "
                placeholder="Enter category name" required>
            <input type="submit"
                class="btn btn-primary mt-4 w-full text-xl font-mono transition-all duration-30 transform hover:scale-105"
                value="Create Category">
        </form>
    </div>
</body>
@include('layouts.footer')

</html>

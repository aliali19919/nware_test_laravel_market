<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <a href="{{ route('categories.create') }}"
        class=" btn btn-primary my-[20px] text-3xl font-mono font-semibold p-[40px] ms-[20px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">Create
        Category</a>
    <a href="{{ route('products.index') }}"
        class=" btn btn-secondary my-[20px] text-3xl font-mono font-semibold p-[40px] ms-[20px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">Manage
        Products</a>

    <div class="overflow-x-auto table-zebra table-lg">
        <table class="table">

            <thead>

                <tr class="text-4xl font-mono text-black ">
                    <th>ID</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-base-400 text-lg font-mono">
                        <td> {{ $category->id }}</td>
                        <td>{{ $category->category }}</td>
                        <td><a href="{{ route('categories.show', $category->id) }}"
                                class="btn text-xl btn-primary transition-all duration-300 ease-in-out hover:scale-110">
                                View Category Products</a>
                        </td>
                    </tr>

            </tbody>
            @endforeach
        </table>
    </div>
    {{-- <div class="overflow-x-auto">
        <table class="table">

            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>{{ $category->id }}</tr>
                    <tr>{{ $category->category }}</tr>
                    <tr><a href="">View Category Products</a>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div> --}}
</body>

</html>

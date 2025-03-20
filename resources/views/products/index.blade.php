<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <a href="/"
        class=" btn btn-accent my-[20px] text-3xl font-mono font-semibold p-[40px] ms-[20px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">Home</a>
    <a href="{{ route('products.create') }}"
        class=" btn btn-primary my-[20px] mx-[10px] text-3xl font-mono font-semibold p-[40px] ms-[20px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">Create
        Product</a>
    <a href="{{ route('categories.index') }}"
        class=" btn btn-secondary my-[20px] text-3xl font-mono font-semibold p-[40px] ms-[20px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">Manage
        Categories</a>

    <div class="overflow-x-auto table-zebra table-lg">
        <table class="table">
            <thead>
                <tr class="font-mono text-black font-bold ">
                    <th class="text-2xl">Product ID</th>
                    <th class="text-2xl">Product Name</th>
                    <th class="text-2xl">Product Price</th>
                    <th class="text-2xl">Quantity</th>
                    <th class="text-2xl">Image Path</th>
                    <th class="text-2xl">Category</th>
                    <th class="text-2xl">Action</th>

                </tr>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="font-mono">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->path }}</td>
                        <td>{{ $product->category->category }}</td>
                        <td class="flex gap-[20px]">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class=" btn text-xl btn-primary transition-all duration-300 ease-in-out hover:scale-110">Update</a>
                            <a href="{{ route('products.show', $product->id) }} "
                                class="btn text-xl btn-info transition-all duration-300 ease-in-out hover:scale-110">View</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="Delete"
                                    class="btn text-xl btn-error transition-all duration-300 ease-in-out hover:scale-110">

                            </form>


                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>

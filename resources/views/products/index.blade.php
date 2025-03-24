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
    @include('layouts.navigation')
    <div class="my-[10px]">
        <a href="#"
            class=" btn btn-active my-[20px] text-3xl font-mono font-extrabold p-[40px] ms-[20px]  cursor-text ">TotalQuantity:{{ $totalQuantity }}</a>
        <div class="dropdown dropdown-end mx-[10px]">
            <div tabindex="0" role="button"
                class="btn btn-accent m-1 text-3xl font-mono font-semibold p-[40px] text-white transition-all duration-300 ease-in-out hover:scale-110">
                Sort ⬇️
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                <li><a href="{{ route('products.index', ['sort_price' => 'price']) }}"
                        class=" btn btn-primary font-mono font-semibold p-[10px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">ByPrice</a>
                </li>
                <li><a href="{{ route('products.index', ['sort_quantity' => 'quantity']) }}"
                        class="btn btn-secondary mt-[5px] font-mono font-semibold p-[10px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">ByQuantity</a>
                </li>
            </ul>
        </div>
        <a href="{{ route('products.index', ['trashed' => 'trashed']) }}"
            class=" btn btn-error my-[20px] text-3xl font-mono font-semibold p-[40px] ms-[20px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">Trashed🗑️</a>
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
                        {{-- <th class="text-2xl">Product ID</th> --}}
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
                            {{-- <td>{{ $product->id }}</td> --}}
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <div class="flex gap-[5px] justify-center items-center">
                                    <p>{{ $product->quantity }}</p>
                                    <a href=" product/increase-quantity/{{ $product->id }}"
                                        class="btn btn-primary font-mono transition-all duration-200 hover:scale-110">Add</a>
                                    <a href="product/decrease-quantity/{{ $product->id }}"
                                        class="btn btn-warning font-mono transition-all duration-200 hover:scale-110">Reduce</a>
                                    <div>
                            </td>
                            <td><img src="{{ asset('images/' . $product->path) }}"
                                    class=" w-[70px] h-[70px] rounded-full object-center transition-all duration-200 hover:scale-110   ">
                            </td>
                            <td>{{ $product->category->category }}</td>
                            <td class="flex gap-[20px]">
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class=" btn text-xl btn-primary transition-all duration-300 ease-in-out hover:scale-110">Update</a>
                                <a href="{{ route('products.show', $product->id) }} "
                                    class="btn text-xl btn-info transition-all duration-300 ease-in-out hover:scale-110">View</a>
                                <div class="dropdown dropdown-end">
                                    <div tabindex="0" role="button"
                                        class="btn btn-error text-xl transition-all duration-300 ease-in-out hover:scale-110">
                                        Trash/Delete 🔽</div>
                                    <ul tabindex="0"
                                        class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm text-lg">
                                        <li><a href="product/{{ $product->id }}/trash">Trash🚮</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Delete❌ ">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <a href="product/{{ $product->id }}/publish"
                                    class="btn text-xl btn-primary transition-all duration-300 ease-in-out hover:scale-110">Publish</a>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @include('layouts.footer')

</body>

</html>

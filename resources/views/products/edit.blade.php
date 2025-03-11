<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
    @vite(['resources/css/app.css'])
    @include('sweetalert::alert')
</head>

<body>

    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md transition-transform ">
            <h1 class="text-4xl font-serif font-bold text-center">Update Product ✏️📦</h1>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label for="name" class="font-mono">Product Name 🏷️</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}"
                        class="w-full p-3 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-400 transition">
                </div>

                <div>
                    <label for="price" class="font-mono">Product Price 💰</label>
                    <input type="number" min="0" step="any" name="price" id="price"
                        value="{{ $product->price }}"
                        class="w-full p-3 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-400 transition">
                </div>

                <div>
                    <label class="font-mono">Upload New Image 🖼️</label>
                    <input type="file" name="file" id="file"
                        class="w-full p-2 border border-gray-600 rounded-lg cursor-pointer">
                </div>

                <div class="text-center">
                    <input type="submit" value=" Update Product 🔄"
                        class="text-xl btn btn-primary w-fit font-mono font-semibold px-[70px] mt-[20px] transition-transform duration-300 ease-in-out hover:scale-110">


                </div>

            </form>

            <a href="{{ route('products.index') }}"
                class="btn text-lg btn-primary rounded-lg my-[20px] font-mono font-semibold flex justify-center transition-transform duration-300 ease-in-out hover:scale-110">
                🔙 Back To Products
            </a>
        </div>
    </div>

</body>

</html>

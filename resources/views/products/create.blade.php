<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    @vite(['resources/css/app.css'])


</head>

<body>

    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
            <h1 class="text-4xl font-serif font-bold text-center ">Create Product 📦</h1>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                class="mt-6 space-y-4">
                @csrf


                <div>
                    <label for="name" class="font-mono">Product Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Product Name"
                        class="w-full p-3 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-400 transition">
                </div>


                <div>
                    <label for="price" class="font-mono">Product Price $</label>
                    <input type="number" min="0" step="any" name="price" id="price"
                        placeholder="Enter Product Price"
                        class="w-full p-3 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-400 transition">
                </div>


                <div>
                    <label class=" font-mono">Upload Image</label>
                    <input type="file" name="file" id="file"
                        class="w-full p-2 border border-gray-600 rounded-lg cursor-pointer">
                </div>


                <div>
                    <label for="category" class="  font-mono">Choose Category</label>
                    <select id="category" name="category_id"
                        class="w-full p-3 border border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-400 transition">

                        @foreach ($categories as $category)
                            <option class="font-mono" value="{{ $category->id }}">{{ $category->category }} 🍽️</option>
                        @endforeach


                    </select>
                </div>


                <div class="text-center">
                    <input type="submit" value="Create Product 🛠️"
                        class=" text-xl btn btn-primary w-fit font-mono font-semibold px-[70px] transition-transform duration-300 ease-in-out hover:scale-110 ">
                </div>
            </form>
            <a href="{{ route('products.index') }}"
                class="btn text-lg btn-primary rounded-lg my-[20px] font-mono font-semibold flex justify-center transition-transform duration-300 ease-in-out hover:scale-110">🔙
                Back
                To Products</a>
        </div>
    </div>

</body>

</html>

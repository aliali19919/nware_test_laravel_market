<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <h1 class=" text-center p-[20px] font-mono text-4xl font-bold">{{ $category->category }}</h1>
    <div class=" grid grid-cols-4 gap-[20px] ">
        @foreach ($category->products as $product)
            <div class="m-auto flex justify-center items-center">
                <div class="card  bg-blue-400 text-primary-content w-96 text-center">
                    <div class="card-body p-[50px]">
                        <h2 class="text-center font-mono text-4xl font-bold my-[10px]">{{ $product->name }}</h2>
                        <p class="font-mono text-2xl font-semibold my-[10px]">{{ $product->price }} $</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('categories.index') }}"
        class=" btn btn-primary my-[20px] text-2xl font-mono font-semibold p-[30px] ms-[20px] text-white transition-all duration-300 ease-in-out hover:scale-110 ">Back
        To
        Category</a>
    </div>
</body>

</html>

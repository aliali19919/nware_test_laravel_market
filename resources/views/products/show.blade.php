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
    @include('layouts.navigation')

    <div class="m-auto flex justify-center items-center my-[30px]">
        <div class="card  bg-blue-400 text-primary-content w-96 text-center">
            <div class="card-body p-[50px]">
                <h2 class="text-center font-mono text-4xl font-bold my-[10px]">{{ $product->name }}</h2>
                <p class="font-mono text-2xl font-semibold my-[10px]">{{ $product->price }} $</p>
                <p class="font-mono font-semibold text-3xl my-[10px]">{{ $product->category->category }}</p>
                <div class="card-actions justify-center my-[10px]">
                    <a href="{{ route('products.edit', $product->id) }}"
                        class=" btn text-xl btn-primary transition-all duration-300 ease-in-out hover:scale-110">Update</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete"
                            class="btn text-xl btn-error transition-all duration-300 ease-in-out hover:scale-110">

                    </form>

                </div>
            </div>

        </div>
    </div>
    @include('layouts.footer')
</body>

</html>

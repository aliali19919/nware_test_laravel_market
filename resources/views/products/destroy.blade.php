<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <form action="{{ route('products.destroy', $product->id) }}" method="GET">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">

    </form>

</body>

</html>

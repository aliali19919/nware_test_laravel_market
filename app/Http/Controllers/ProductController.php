<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::with('category')->get();
        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
       return view("products.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $file=$request->file("file");
       $name=$file->getClientOriginalName();
       $file->storeAs("images",$name,"public");
       $input["path"]=$name;
       $input=$request->all();
       $productCreate=Product::create($input);
       if(!$productCreate){
        echo "Product Not Created";
       }else{
        Product::create($input);
       }


      return redirect()->route("products.index");



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::with("category")->findOrFail($id);
        if(!$product){
            echo" Product Not Found";
        }else{
          return view("products.show",compact("product"));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::find($id);
        return view("products.edit",compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    $input=$request->all();
    $file=$request->file("file");
    $name=$file->getClientOriginalName();
    $file->storeAs("images",$name);
    $input["path"]=$name;
    $product=Product::findOrFail($id);
    if(!$product){
        echo" Product Not Found";
    }else{
    $updatedProduct=Product::findOrFail($id)->update($input);
    if(!$updatedProduct){
        echo"Failed To Update";
    }else{
    return redirect()->route("products.index");
    }
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product=Product::findOrFail($id);
        if(!$product){
            echo" Product Not Found";
        }else{
        $deleteProduct=Product::findOrFail($id)->delete();
        if(!$deleteProduct){
            echo"Unsscssfully Deleted";
        }else{
            echo "Sucssfully Deleted";
            return redirect()->route("products.index");
        }
        }

    }
}

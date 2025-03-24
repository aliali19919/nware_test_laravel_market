<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index(Request $request)
    {
       $totalQuantity=Product::all()->sum("quantity");
       $sortPrice= $request->input("sort_price");
       $sortQuantity= $request->input("sort_quantity");
        if($sortPrice=="price"){
            $products = Product::orderBy("price")->with('category')->get();
        }elseif($sortQuantity=="quantity"){
         $products = Product::orderBy("quantity")->with('category')->get();
        }else{
            $products = Product::with('category')->get();
        }

        return view("products.index", compact("products","totalQuantity"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  $categories=Category::all();
       return view("products.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $file=$request->file("file");
       if($file){

       $name=$file->getClientOriginalName();
       $file->move("images", $name);
       $input=$request->all();
       $input["path"]=$name;
       $existProduct=Product::where("name",$request->name)->where("category_id",$request->category_id)->first();
       if($existProduct){
       $existProduct->quantity++;
       $existProduct->save();

       }else{
        Product::create($input);

       }
       }else{
        return"Please Upload the image";
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
    if($file){
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
    }else{
        return"Please Upload the file";
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
    public function incQuantity($id){
        $product=Product::find($id);
        $product->quantity++;
        $product->save();
        return redirect()->route("products.index");


    }

    public function decQuantity($id){
        $product=Product::find($id);
        $product->quantity--;
        $product->save();
        return redirect()->route("products.index");


    }


}

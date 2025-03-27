<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

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
       $trashed=$request->input("trashed");
        if($sortPrice=="price"){
            $products = Product::orderBy("price")->with('category')->get();
        }elseif($sortQuantity=="quantity"){
         $products = Product::orderBy("quantity")->with('category')->get();
        }elseif($trashed==="trashed"){
            $products=Product::onlyTrashed()->with("category")->get();

        }
        else{
            $products = Product::with('category')->get();
        }

        return view("products.index", compact("products","totalQuantity","trashed"));
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
        Log::channel("mylog")->info("Product Created",$input);
        // Http::post("http://127.0.0.1:8001/api/logs",["level"=>"info","message"=>"Product Created"]);
       }
       }else{

        Alert::warning('📤', 'Please Upload the image');
        // Http::post("http://127.0.0.1:8001/api/logs",["level"=>"warning","message"=>"Product Failed to Create"]);
        return redirect()->route('products.create');
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
            Log::channel("mylog")->warning("Product Not Found");
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
        Log::info('request');
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
    // Http::post("http://127.0.0.1:8001/api/logs",["level"=>"info","message"=>"Product Updated"]);
    Log::channel("mylog")->info("Product Updated",$input);
    return redirect()->route("products.index");
    }
    }
    }else{

        Alert::warning('⚠️', 'Please Upload the image📤');
        Log::channel("mylog")->warning("Unable to Update Product");
        // Http::post("http://127.0.0.1:8001/api/logs",["level"=>"info","message"=>"Product Failed Updated"]);
        return redirect()->route('products.index');
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
        $deleteProduct=Product::findOrFail($id)->destroy($id);
        if(!$deleteProduct){
            echo"Unsscssfully Deleted";
        }else{
            Log::channel("mylog")->info("Product Deleted");
            // Http::post("http://127.0.0.1:8001/api/logs",["level"=>"info","message"=>"Product Permanently Delete"]);
            return redirect()->route("products.index");
        }
        }

    }
    public function trashProduct($id){
        Product::find($id)->delete();
        return redirect()->route("products.index");
    }

    public function publishProduct($id){
       $product=Product::onlyTrashed()->find($id);
       if(!$product){

    //    Http::post("http://127.0.0.1:8001/api/logs",["level"=>"warning","message"=>"Product Not In Trash"]);
       Alert::error('❌', 'Product Not Trashed 🗑️');
       return redirect()->route('products.index');
       }else{
        $product->restore();
        // Http::post("http://127.0.0.1:8001/api/logs",["level"=>"info","message"=>"Product Published"]);
        Alert::success('🚀', 'Product Published');
        return redirect()->route('products.index');

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
        if($product->quantity <= 0){
            $product->quantity = 0;
            Alert::error('❌', 'Product Quantity 🟰 0');
            // Http::post("http://127.0.0.1:8001/api/logs",["level"=>"warning","message"=>"Product Quantity can't be below zero"]);
            return redirect()->route("products.index");
        }else{
        $product->quantity--;
        $product->save();
        return redirect()->route("products.index");
        }

    }




}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;




class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $categories=Category::all();
        if(!$categories){
        echo "Categories Not Found";
        }else{
        return view("categories.index",compact("categories"));
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $category=Category::create($input);
        if(!$category){
            echo"Failed To Create Category";
        }else{
           return redirect()->route("categories.index");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $category=Category::with("products")->findOrFail($id);
    if(!$category){
    echo "Not Found";
    }else{
return view("categories.show",compact("category"));
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

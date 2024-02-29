<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product ;

    /* Add a new product using the given request data */
class productController extends Controller
{
    function addProduct(Request $request)
    {
        $product = new Product() ;
        $product->name = $request->input("name") ;
        $product->description = $request->input("description") ;
        $product->price = $request->input("price") ;
        $product->image = $request->file("image")->store("images") ;
        $product->save() ;
        return $product ; 
    }

    /* List all products */
    function listProducts()
    {
        $products = Product::all() ;
        return $products ;
    }

    /* Delete the product with the given id */
    function delete($id){
        $result = Product::where("id" , $id)->delete() ;
        if ($result)
        {
            return ["result" => "Deleted Successfully"] ;
        }
        else
        {
            return ["result" => "Failed to delete"] ;
        }
    }

    /* get the product with the given id */
    function getProduct($id)
    {
        $product = Product::find($id) ;
        return $product ;
    }

    /* Update product with given id */
    function updateProduct($id , Request $request)
    {
        $product = Product::find($id) ;
        $product->name = $request->input("name") ;
        $product->description = $request->input("description") ;
        $product->price = $request->input("price") ;
        if ($request->file("file"))
        {
            $product->image = $request->file("image")->store("images") ;
        }
        $product->save() ;
        return $product ;
    }

    function search($key){
        return Product::where("name" , "Like" , "%$key%")->get();
    }
}


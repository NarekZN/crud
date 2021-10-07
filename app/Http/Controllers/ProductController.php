<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TagController;

use App\Models\Tag;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product=Product::find(1);
        // $product->tags()->attach(1);
        // dd($product->tags);
        $tags=Tag::all();
        $products = Product::paginate(20);
        return view("products/index", compact("products","tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tag=Tag::all();
        return view("products/form", compact("tag"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request,Product $product)
    {
        $userId = auth()->user()->id;
        $request->request->add(["user_id"=>"$userId"]);
        
        $CreatedProduct = Product::create($request->only("user_id","product","price"));
            
         if($request->tags):
            $product=Product::find($CreatedProduct->id);
            $product->tags()->attach($request->tags);
         endif;  
         return redirect()->route("product.index")->withSuccess("Created product" ." ". $request->product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product )
    {
        $userInfo = User::find($product->user_id);
         return view("products/show" , compact("product", "userInfo"));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Tag  $tag
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $tag=Tag::all();
        return view("products/form", compact("product","tag"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->only(["product","price"]));
        if($request->tags):
            $product=Product::find($product->id);
            $product->tags()->sync($request->tags);
        endif;  
        return redirect()->route("product.index")->withSuccess("Updated product" ." ". $product->product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("product.index")->withDanger("Deleted product" ." ". $product->product);
    }

    
    
}

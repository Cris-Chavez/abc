<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Price;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();

        return view('product.create', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $sku = Str::random(10);

        if(empty($request->file('avatar')))
            $imagen = 'public/img/product/no-product.png';
        else
            $imagen = $request->file('avatar')->store('public/img/product');        
            
        $photo = Storage::url($imagen);

        $product = new Product();

        $product->name          =   $request->name;
        $product->presentation  =   $request->presentation;
        $product->sku           =   $sku;
        $product->volumen       =   $request->volume;
        $product->quantity      =   $request->quantity;
        $product->stock         =   0;
        $product->photo         =   $photo;
        $product->save();

        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function catalogue()
    {
        $providers = Provider::all();

        return view('product.catalogue', compact('providers'));
    }

    public function search(Request $request)
    {
        $products = Price::join('products', 'prices.product_id', '=', 'products.id')
                            ->where('provider_id', $request->provider)
                            ->select('products.*','prices.price as price')
                            ->get();

        $content = view('product.select',compact('products'))->render();

        return response()->json(array(
            'success'   =>  true,
            'response'  =>  $content
        ));

    }
}

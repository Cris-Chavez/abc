<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $providers = Provider::all();
        return view('price.create',compact('products','providers'));
    }

    public function getPrices(Request $request){

        $prices = Price::where('product_id','=',$request->product)->get();        
        // $prices = Price::all();

        $content = view('price.table', compact('prices'))->render();
        // $content = view('price.table')->render();
        // $content = "Hola";


        return response()->json(array(
            'success'   =>  true,
            'response'  =>  $content
        ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = new Price();
                
        $price->product_id  =   $request->product;
        $price->provider_id =   $request->provider;
        $price->price       =   $request->cost;
        $price->save();  

        // $content = view('price.table', compact('prices'))->render();
        // $content = view('price.table')->render();
        
        $prices = Price::where('product_id','=',$request->product)->get();
        $content = count($prices)+1;



        return response()->json(array(
            'success'   =>  true,
            'response'  =>  $content
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}

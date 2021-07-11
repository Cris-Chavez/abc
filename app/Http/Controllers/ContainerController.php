<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Destination;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Price;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $containers = Container::all();

        return view('container.index', compact('containers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = Destination::all();
        $products = Product::all(); 
        $providers = Provider::all();

        return view('container.create', compact('destinations', 'products', 'providers'));
    }

    public function getProvider(Request $request)
    {
        $providers = Price::join('providers', 'prices.provider_id', '=', 'providers.id')
                            ->where('product_id', $request->product)
                            ->select('providers.id', 'providers.name')
                            ->get();

        $content = view('container.select',compact('providers'))->render();

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
        $container = new Container();

        $container->destination_id  =   $request->destination;
        $container->product_id      =   $request->product;
        $container->provider_id     =   $request->provider;
        $container->quantity        =   $request->quantity;
        $container->possible_date   =   $request->possible_date;
        $container->save();

        return redirect()->route('container.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function show(Container $container)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function edit(Container $container)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Container $container)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function destroy(Container $container)
    {
        //
    }
}

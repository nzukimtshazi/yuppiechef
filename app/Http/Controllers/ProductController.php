<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('id', '>', 0)->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::where('name', '=', $request->name)->count();
        if ($product > 0)
            return redirect('product/add')->withInput()->with('danger', 'Product already exists');

        $input = $request->all();
        $products = new Product($input);

        if ($products->save())
            return Redirect::route('products')->with('success', 'Successfully added product!');
        else
            return Redirect::route('addProduct')->withInput()->withErrors($products->errors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product_check = Product::where('name', '=', $request->name)->first();

        if ($product_check && $product_check->id != $id)
            return Redirect::route('editProduct', [$id])->withInput()->with('danger', 'Product already exists');

        $product->name = $request->name;

        if ($product->update())
            return Redirect::route('products')->with('success', 'Successfully updated product!');
        else
            return Redirect::route('editProduct', [$id])->withInput()->withErrors($product->errors());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

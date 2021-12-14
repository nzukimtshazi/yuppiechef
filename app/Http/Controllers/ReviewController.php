<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Reviews::where('id', '>', 0)->get();
        return view('review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('name', '=', Auth::user()->name)
            ->where('email', '=', Auth::user()->email)->first();
        $products = Product::where('id', '>', 0)->get();

        return view('review.create', compact('user', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->product_id == null)
            return Redirect::route('createReview')->withInput()->with('danger', 'Please select the product to review');

        $input = $request->all();
        $reviews = new Reviews($input);

        if ($reviews->save())
            return Redirect::route('reviews')->with('success', 'Successfully added review!');
        else
            return Redirect::route('addReview')->withInput()->withErrors($reviews->errors());
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
        $review = Reviews::find($id);
        $products = Product::where('id', '>', 0)->get();
        $product = Product::where('id', '=', $review->product_id)->first();
        $pid = $product->id;
        $name = $product->name;
        return view('review.edit', compact('review', 'products', 'pid', 'name'));
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
        $review = Reviews::find($id);

        $review->description = $request->description;
        $review->rating = $request->rating;
        $review->user_name = $request->user_name;
        $review->email = $request->email;
        $review->product_id = $request->product_id;

        if ($review->update())
            return Redirect::route('reviews')->with('success', 'Successfully updated review');
        else
            return Redirect::route('editReview', [$id])->withInput()->withErrors($review->errors());
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

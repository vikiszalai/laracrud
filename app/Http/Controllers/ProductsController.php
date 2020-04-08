<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;
use App\Product;
use DB;
use Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $products = DB::select("SELECT products.id,products.title,products.body,products.active_from,products.active_to,products.price,products.image,GROUP_CONCAT(name) as tags FROM labels,products WHERE products.id = labels.product_id AND products.user_id = '$id' GROUP BY labels.product_id ORDER BY products.id DESC");
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->all();
        return $input;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product;
        $product->user_id  = auth()->user()->id;
        $product->title = $request->input('product_name');
        $product->body = $request->input('product_desc');
        $product->active_from = $request->input('active_from');
        $product->active_to = $request->input('active_to');
        $product->price = $request->input('product_price');
        $product->image = $request->input('img');
        $product->save();

        $maxValue = Product::latest()->value('id');

        $tags = $request->input('tags');
        foreach ($tags as $key) {
            $label = new Label;
            $label->product_id = $maxValue;
            $label->name = $key;
            $label->save();
        }


        return redirect('./products')->with('success', 'Termék felvéve');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product =  Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update =  Product::find($request->input('product_id'));
        $update->title = $request->input('product_name');
        $update->body = $request->input('product_desc');
        $update->active_from = $request->input('active_from');
        $update->active_to = $request->input('active_to');
        $update->price = $request->input('product_price');
        $update->image = $request->input('img');
        $update->save();

        $tags = $request->input('tags');
        foreach ($tags as $key) {
            $label = Label::find($request->input('product_id'));
            $label->product_id = $request->input('product_id');
            $label->name = $key;
            $label->save();
        }
    }
    public function destroy(Request $request)
    {
        $Product = Product::find($request->product_id);
        $Product->delete();
    }
}

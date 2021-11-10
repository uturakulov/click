<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::withTrashed()->latest()->with('category')->with('user');

        if ($request->name) {
            $product->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->description) {
            $product->where('description', 'like', '%' . $request->description . '%');
        }

        if ($request->price) {
            $product->where('price', 'like', '%' . $request->price . '%');
        }

        if ($request->created) {
            $product->where('created_at', 'like', '%' . $request->created . '%');
        }

        if ($request->user) {
            $product->whereRelation('user', 'first_name', 'like', '%' . $request->user . '%');
        }

        if ($request->category) {
            $product->whereRelation('category', 'title', 'like', '%' . $request->category . '%');
        }

        return $product->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        validator($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
        ])->validate();

        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $imageName = asset("images/" . time() . '.' . $request->image->extension());
        $request->image->move(public_path('images/'), $imageName);
        $product->image = $imageName;
        $product->save();

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::whereId($id)->get();
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
        $product = Product::findOrFail($id);
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($request->image != null) {
            $imageName = asset("images/" . time() . '.' . $request->image->extension());
            $request->image->move(public_path('images/'), $imageName);
            $product->image = $imageName;
        }
        $product->save();

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response(204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function getProducts()
    {
        // Get products
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        // Return collection of products as a resource
        return response()->json(['products' => $products]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        if ($request->hasFile('file')) {
            $this->path = $request->file('file')->store('products');
        } else {
            return response()->json(['message' => 'Please add an Image',  'status' => false], 404);
        }

        $product = new Product;

        $product->name = $request->input('name');
        $product->desc = $request->input('desc');
        $product->price = $request->input('price');
        $product->user_id = $request->input('user_id');
        $product->status = $request->input('status');
        $product->image = $this->path;
        $product->save();

        return response()->json(['product' => $product]);
    }

    public function putProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $product = Product::findOrFail($request->project_id);

        $product->update([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'price' => $request->input('price'),
            'user_id' => $request->input('user_id'),
            'status' => $request->input('status'),
        ]);
        return response()->json(['product' => $product]);
    }

    public function deleteProduct($id)
    {
        // Get product
        $product = Product::findOrFail($id);
        if (!$product) {
            return response()->json(['message' => 'product not found', 'status' => false], 404);
        }
        if ($product->delete()) {
            return response()->json(['message' => 'Product deleted successfully']);
        }
    }
}

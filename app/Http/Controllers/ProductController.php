<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status' => true,
            'message' => 'Product fetched successfully',
            'data' => $product
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        Product::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product created successfully'
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Product fetched successfully',
            'data' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
            'data' => $product
        ]);
    }
}

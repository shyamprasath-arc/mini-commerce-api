<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    //
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $product = $this->productService->getAll();
        return response()->json([
            'status' => true,
            'message' => 'Product fetched successfully',
            'data' => $product
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product created successfully'
        ]);
    }

    public function show($id)
    {
        $product = $this->productService->find($id);
        return response()->json([
            'status' => true,
            'message' => 'Product fetched successfully',
            'data' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->update($id, $request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = $this->productService->delete($id);
        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
            'data' => $product
        ]);
    }
}

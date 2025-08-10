<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{

    protected ProductService $productService;

    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function getProduct($id){
        $product = $this->productService->getProduct($id);

        return response()->json(['data' => $product]);
    }

    public function getAllProducts(){
        $products = $this->productService->getAll();

        return response()->json(['data' => $products]);
    }

    public function updateProduct(ProductRequest $request, $id){
        $product = $this->productService->updateProduct($request->validated(), $id);

        return response()->json(['data' => $product]);
    }

    public function createProduct(ProductRequest $request){
        $product = $this->productService->createProduct($request->validated());

        return response()->json(['data' => $product]);
    }
}

<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;

class ProductServiceIml implements ProductService{


    public function getProduct(int $id){
        // $data = Product::with('reviews')->findOrFail($id);
        $data = Product::with(['reviews.user:id,email'])->findOrFail($id);

        return $data;
    }

    public function getAll(){
        $data = Product::all();

        return $data;
    }

    public function updateProduct(array $data, int $id){
        $product = Product::findOrFail($id);

        $product->update($data);

        return $product;
    }

    public function createProduct(array $data){
        $product = Product::create($data);

        return $product;
    }

    public function searchProduct(string $keyword){
        $products = Product::where('name', 'like', "%{$keyword}%")->get();

        return $products;
    }

    public function addToCart(array $data){
        $existingProduct = Cart::where('user_id', $data['user_id'])->where('product_id', $data['product_id'])->first();
        if($existingProduct){
            $existingProduct->subtotal += $data['subtotal'];
            $existingProduct->quantity += $data['quantity'];
            $existingProduct->save();

            $cart = $existingProduct;
        }else{
            $cart = Cart::create($data);
        }

        return $cart;
    }

    public function getCart(int $id){
        $cart = Cart::where('user_id', $id)->with('products:id,name')->get();
        return $cart;
    }

    public function updateCart(array $data){
        $cart = Cart::findOrFail($data['id']);
        $cart->update($data);

        return $cart;
    }
}
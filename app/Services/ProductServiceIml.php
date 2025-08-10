<?php

namespace App\Services;

use App\Models\Product;

class ProductServiceIml implements ProductService{


    public function getProduct(int $id){
        $data = Product::findOrFail($id);

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
}
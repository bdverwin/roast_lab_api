<?php

namespace App\Services;


interface ProductService{

    public function getProduct(int $id);

    public function getAll();
    
    public function updateProduct(array $data, int $id);

    public function createProduct(array $data);

    public function searchProduct(string $keyword);

    public function addToCart(array $data);

    public function getCart(int $id);
}
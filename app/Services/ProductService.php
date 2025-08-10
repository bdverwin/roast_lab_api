<?php

namespace App\Services;


interface ProductService{

    public function getProduct(int $id);

    public function getAll();
    
    public function updateProduct(array $data, int $id);

    public function createProduct(array $data);
}
<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    protected $album;

    // 透過 DI 注入 Model
    public function __construct(Product $product)
    {
        $this->model = $product;
    }


}

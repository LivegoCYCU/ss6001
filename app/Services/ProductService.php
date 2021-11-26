<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProuctService 
{
    protected $productRepository;

    // 透過 DI 注入 Repository
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    

}

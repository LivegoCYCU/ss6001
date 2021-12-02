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


    public function getProductByConditions($condition)
    {
        return $query = Product::orderBy('price')
            ->where(function ($query) use ($condition) {
                if ($condition->get('category') != null) {
                    $query->where('product_category_id', $condition->get('category'));
                }

                if ($condition->get('name') != null ) {
                    $query->where('name', 'like', '%' . $condition->get('name') . '%');
                }
                
            })
            ->paginate(25);
    }
}

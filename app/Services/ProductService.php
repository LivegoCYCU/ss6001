<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Product;

class ProductService
{
    protected $productRepository;

    // 透過 DI 注入 Repository
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createShopeeModels($request)
    {
        // get蝦皮商品列表 JSON
        $getItemListJson = file_get_contents("https://shopee.tw/api/v4/item/get?itemid=" . $request->get('shopee_item_id') . "&shopid=" . $request->get('shopee_shope_id'));
        $itemList = json_decode($getItemListJson)->data;
        //如果有找到商品
        if ($itemList != null) {
            // 新增商品
            foreach ($itemList->models ?? [] as $model) {
                $flight = Product::updateOrCreate(
                    [
                        'name' => $model->name,
                        'description' =>  $request->get('description'),
                        'product_category_id' => $request->get('product_category_id'),
                        'price' => $model->price / 100000,
                        'stock' => $model->stock,
                        'stock_defective' => 0,
                        'shopee_item_url' => $request->get('shopee_item_url'),
                        'cost' => $request->get('cost'),
                    ],
                    [
                        'shopee_model_id' => $model->modelid,
                        'shopee_item_id' =>  $model->itemid
                    ]
                );
            }   
            //直接導向products.index
            return redirect()
                ->route('products.index')
                ->withStatus(trans('message.registered',  ['title' => trans('inventory.product')]));
        }
    }
}

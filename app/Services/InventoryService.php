<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Product;
use App\SoldProduct;
use App\Sale;
use App\Client;
use App\Enums\ClientType;

class InventoryService
{
    protected $productRepository;

    // 透過 DI 注入 Repository
    public function __construct()
    {
    }

    public function createShopeeOrder($collection)
    {
        // 費用可以考慮要不要單獨新增到expence
        foreach ($collection as $order) {


            $client = Client::firstOrCreate([
                'name' => $order['收件者姓名 (單)'],
                'document_type' => ClientType::SHOPEE,
                'document_id' =>  $order['買家帳號 (單)']
            ]);

            $sale = Sale::updateOrCreate(['sales_id' => $order['訂單編號']], [
                'user_id' => 1,
                'client_id' => $client->id,
                'total_amount' => $order['訂單總金額 (單)'],
                'finalized_at' => date('Y-m-d H:i:s', strtotime($order['買家付款時間 (單)'])) 
            ]);

            /**
             *  e.g. 35275397801-1;35275397802-2
             *  product model id = 35275397801 , qty = 1 & product model id = 35275397802 , qty = 2
             *  for product bundle
             */
            $product_models =  explode(";", $order['商品選項貨號']);
            if ($product_models[0] != "") {
                foreach ($product_models as $product) {
                    $model = explode("-", $product);

                    $product = Product::where('shopee_item_id', $order['主商品貨號'])
                        ->where('shopee_model_id', $model[0])
                        ->first();

                    SoldProduct::updateOrCreate(
                        [
                            'product_id' => $product->id,
                            'finalized_at' =>  date('Y-m-d H:i:s', strtotime($order['買家付款時間 (單)'])) 
                        ],
                        [
                            'sale_id' =>  $sale->id,
                            'qty' => $order['數量'] * $model[1],
                            'price' =>  $order['商品活動價格 (品)'],
                            'total_amount' =>  $order['商品總價 (單)']
                        ]
                    );

                    $product->decrement('stock', $order['數量'] * $model[1]);
                }
            }

            //transactions 尚未新增
        }
    }
}

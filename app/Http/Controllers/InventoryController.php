<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use App\SoldProduct;
use App\ProductCategory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;

class InventoryController extends Controller
{
    public function stats()
    {
        return view('inventory.stats', [
            'categories' => ProductCategory::all(),
            'products' => Product::all(),
            'soldproductsbystock' => SoldProduct::selectRaw('product_id, max(created_at), sum(qty) as total_qty, sum(total_amount) as incomes, avg(price) as avg_price')->whereYear('created_at', Carbon::now()->year)->groupBy('product_id')->orderBy('total_qty', 'desc')->limit(15)->get(),
            'soldproductsbyincomes' => SoldProduct::selectRaw('product_id, max(created_at), sum(qty) as total_qty, sum(total_amount) as incomes, avg(price) as avg_price')->whereYear('created_at', Carbon::now()->year)->groupBy('product_id')->orderBy('incomes', 'desc')->limit(15)->get(),
            'soldproductsbyavgprice' => SoldProduct::selectRaw('product_id, max(created_at), sum(qty) as total_qty, sum(total_amount) as incomes, avg(price) as avg_price')->whereYear('created_at', Carbon::now()->year)->groupBy('product_id')->orderBy('avg_price', 'desc')->limit(15)->get()
        ]);
    }

    public function uploadShopeeOrder()
    {
        try {
            Excel::load(Input::file('file'), function ($reader) {

                foreach ($reader->toArray() as $row) {
                    User::firstOrCreate($row);
                }
            });
            \Session::flash('success', 'Users uploaded successfully.');
            return redirect(route('users.index'));
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
            return redirect(route('users.index'));
        }
    }
}

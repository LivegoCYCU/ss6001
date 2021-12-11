<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use App\SoldProduct;
use App\ProductCategory;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrdersImport;
use App\Services\ExcelService;
use App\Services\InventoryService;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    protected $excelService;
    protected $inventoryService;

    public function __construct(ExcelService $excelService, InventoryService $inventoryService)
    {
        $this->excelService = $excelService;
        $this->inventoryService = $inventoryService;
    }


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

    public function uploadShopeeOrder(Request $request)
    {
        DB::beginTransaction();

        try {
            $excel = Excel::toCollection(new OrdersImport, $request->files->get('shopee_excel'));
            $sortExcel = $this->excelService->sortExcelByCollection($excel);
            $this->inventoryService->createShopeeOrder($sortExcel);
            DB::commit();
            return redirect()
                ->route('inventory.stats')
                ->withStatus('Shopee order update successfully created.');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()
                ->route('inventory.stats')
                ->withStatus('Shopee order update successfully error.');
        }


    }
}

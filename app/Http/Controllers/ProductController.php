<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function __construct(ProductService $productService, ProductRepository $productRepository)
    {
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products =  $this->productRepository->getProductByConditions($request);
        $categories = ProductCategory::get();

        return view('inventory.products.index', compact('products'), ['categories' => $categories, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('inventory.products.create', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_shopee()
    {
        $categories = ProductCategory::all();

        return view('inventory.products.create_shopee', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   Illuminate\Http\Request;
     * @return \Illuminate\Http\Response
     */
    public function store_shopee(Request $request)
    {
        // shopee item id get from item url 
        $explode_shopee_url = explode(".", $request->get('shopee_item_url'));
        $len_url = count($explode_shopee_url);
        $request->request->add(['shopee_item_id' => $explode_shopee_url[$len_url - 1]]);
        $request->request->add(['shopee_shope_id' => $explode_shopee_url[$len_url - 2]]);

        $this->productService->createShopeeModels($request->request);

        return redirect()
            ->route('products.index')
            ->withStatus(trans('message.registered',  ['title' => trans('inventory.product')]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @param  App\Product  $model
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $model)
    {
        $explode_shopee_url = explode(".", $request->get('shopee_item_url'));
        $len_url = count($explode_shopee_url);
        // shopee item id get from item url 
        $request->request->add(['shopee_item_id' => $explode_shopee_url[$len_url - 1]]);


        $model->create($request->all());

        return redirect()
            ->route('products.index')
            ->withStatus(trans('message.registered',  ['title' => trans('inventory.product')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $solds = $product->solds()->latest()->limit(25)->get();

        $receiveds = $product->receiveds()->latest()->limit(25)->get();

        return view('inventory.products.show', compact('product', 'solds', 'receiveds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Request $request)
    {
        $categories = ProductCategory::all();

        return view('inventory.products.edit', compact('product', 'categories', 'request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()
            ->route('products.index', [$request])
            ->withStatus(trans('message.updated',  ['title' => trans('inventory.product')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        $product->delete();

        return redirect()
            ->route('products.index', [$request])
            ->withStatus(trans('message.removed',  ['title' => trans('inventory.product')]));
    }
}

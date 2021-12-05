@extends('layouts.app', ['page' => trans('sidebar.header.list_of_products'), 'pageSlug' => 'products', 'section' =>
'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ trans('inventory.product') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('products.create') }}"
                                class="btn btn-sm btn-primary">{{ trans('inventory.new_product') }}</a>
                            <a href="{{ route('products.create_shopee') }}"
                                class="btn btn-sm btn-primary">{{ trans('inventory.new_shopee_product') }}</a>
                        </div>
                    </div>

                    <form method="get" action="{{ route('products.store') }}" class="form-inline row" autocomplete="off">
                        <select class="custom-select text-dark m-2" name="category">
                            <option selected value="null" class="d-none">
                                {{ trans('button.choese') . trans('inventory.product') . trans('inventory.category') }}
                            </option>
                            @foreach ($categories as $category)
                                @if ($request->get('category')  == $category->id)
                                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input class="form-control m-2" name="name" type="text"
                            placeholder="{{ trans('button.type') . trans('inventory.product') }}"
                            value="{{ $request->get('name')  }}">
                        <button type="submit" class="btn btn-primary mb-2">{{ trans('button.search') }}</button>
                    </form>

                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ trans('inventory.category') }}</th>
                                <th scope="col">{{ trans('inventory.product') }}</th>
                                <th scope="col">{{ trans('inventory.price') }}</th>
                                @if(Auth::user()->is_super_admin)
                                    <th scope="col">{{ trans('inventory.cost') }}</th>     
                                @endif
                                <th scope="col">{{ trans('inventory.stock') }}</th>
                                <th scope="col">{{ trans('inventory.faulty') }}</th>
                                <th scope="col">{{ trans('inventory.total_sold') }}</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><a
                                                href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a>
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ format_money($product->price) }}</td>
                                        @if(Auth::user()->is_super_admin)
                                            <td>{{ format_money($product->cost) }}</td>
                                        @endif
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->stock_defective }}</td>
                                        <td>{{ $product->solds->sum('qty') }}</td>
                                        <td> 
                                            @if($product->check_stock == true)
                                                <span class="badge badge-primary">{{trans('inventory.stock_ok')}}</span>
                                            @endif
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="{{ trans('inventory.more') }}">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="{{ trans('inventory.edit') }}">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                    data-placement="bottom" title="{{ trans('inventory.delete') }}"
                                                    onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $products->appends(request()->input())->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

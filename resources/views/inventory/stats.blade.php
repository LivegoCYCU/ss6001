@extends('layouts.app', ['page' => trans('sidebar.header.inventory_statistics'), 'pageSlug' => 'istats', 'section' =>
'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('order.import_shopee') }}"  enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="shopee_excel">
                        <label class="custom-file-label" for="customFile">{{ trans('auth.choose_file') }}</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ trans('button.save') }}</button>
                </div>
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('inventory.title_quantity') }} (TOP 15)</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>{{ trans('inventory.category') }}</th>
                            <th>{{ trans('inventory.name') }}</th>
                            <th>{{ trans('inventory.stock') }}</th>
                            <th>{{ trans('inventory.annual_sales') }}</th>
                            <th>{{ trans('inventory.average_price') }}</th>
                            <th>{{ trans('inventory.annual_income') }}</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($soldproductsbystock as $soldproduct)
                                <tr>
                                    <td><a
                                            href="{{ route('products.show', $soldproduct->product) }}">{{ $soldproduct->product_id }}</a>
                                    </td>
                                    <td><a
                                            href="{{ route('categories.show', $soldproduct->product->category) }}">{{ $soldproduct->product->category->name }}</a>
                                    </td>
                                    <td>{{ $soldproduct->product->name }}</td>
                                    <td>{{ $soldproduct->product->stock }}</td>
                                    <td>{{ $soldproduct->total_qty }}</td>
                                    <td>{{ format_money(round($soldproduct->avg_price, 2)) }}</td>
                                    <td>{{ format_money($soldproduct->incomes) }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('products.show', $soldproduct->product) }}"
                                            class="btn btn-link" data-toggle="tooltip" data-placement="bottom"
                                            title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('inventory.title_income') }} (TOP 15)</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>{{ trans('inventory.category') }}</th>
                                <th>{{ trans('inventory.name') }}</th>
                                <th>{{ trans('inventory.sold') }}</th>
                                <th>{{ trans('inventory.income') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($soldproductsbyincomes as $soldproduct)
                                    <tr>
                                        <td>{{ $soldproduct->product_id }}</td>
                                        <td><a
                                                href="{{ route('categories.show', $soldproduct->product->category) }}">{{ $soldproduct->product->category->name }}</a>
                                        </td>
                                        <td><a
                                                href="{{ route('products.show', $soldproduct->product) }}">{{ $soldproduct->product->name }}</a>
                                        </td>
                                        <td>{{ $soldproduct->total_qty }}</td>
                                        <td>{{ format_money($soldproduct->incomes) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('inventory.title_avg_price') }} (TOP 15)</h4>
                </div>
                <div class="card-body">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>{{ trans('inventory.category') }}</th>
                                <th>{{ trans('inventory.name') }}</th>
                                <th>{{ trans('inventory.sold') }}</th>
                                <th>{{ trans('inventory.average_price') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($soldproductsbyavgprice as $soldproduct)
                                    <tr>
                                        <td>{{ $soldproduct->product_id }}</td>
                                        <td><a
                                                href="{{ route('categories.show', $soldproduct->product->category) }}">{{ $soldproduct->product->category->name }}</a>
                                        </td>
                                        <td><a
                                                href="{{ route('products.show', $soldproduct->product) }}">{{ $soldproduct->product->name }}</a>
                                        </td>
                                        <td>{{ $soldproduct->total_qty }}</td>
                                        <td>{{ format_money(round($soldproduct->avg_price, 2)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

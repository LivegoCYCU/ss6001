@extends('layouts.app', ['page' => 'Provider Information', 'pageSlug' => 'providers', 'section' => 'providers'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans("providers.show") }}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th scope="col">{{ trans('providers.name') }}</th>
                            <th scope="col">{{ trans('providers.company') }}</th>
                            <th scope="col">{{ trans('providers.LINE') }}</th>
                            <th scope="col">{{ trans('providers.email') }}</th>
                            <th scope="col">{{ trans('providers.telephone') }}</th>
                            <th scope="col">{{ trans('providers.order_amount') }}</th>
                            <th scope="col">{{ trans('providers.receipt_amount') }}</th>
                            <th scope="col">{{ trans('providers.description') }}</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->company }}</td>
                                <td>{{ $provider->LINE }}</td>
                                <td>{{ $provider->email }}</td>
                                <td>{{ $provider->phone }}</td>
                                <td>{{ format_money(abs($provider->transactions->sum('amount'))) }}</td>
                                <td>{{ format_money(abs($provider->transactions->sum('amount'))) }}</td>
                                <td>{{ $provider->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Latest Payments</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Method</th>
                            <th>Amount</th>
                            <th>Reference</th>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->title }}</td>
                                    <td><a href="{{ route('methods.show', $transaction->method) }}">{{ $transaction->method->name }}</a></td>
                                    <td>{{ format_money($transaction->amount) }}</td>
                                    <td>{{ $transaction->reference }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Latest Receipts</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Date</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>products</th>
                            <th>Stock</th>
                            <th>Defective Stock</th>
                            <th>Total Stock</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($receipts as $receipt)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($receipt->created_at)) }}</td>
                                    <td><a href="{{ route('receipts.show', $receipt) }}">{{ $receipt->id }}</a></td>
                                    <td>{{ $receipt->title }}</td>
                                    <td>{{ $receipt->products->count() }}</td>
                                    <td>{{ $receipt->products->sum('stock') }}</td>
                                    <td>{{ $receipt->products->sum('stock_defective') }}</td>
                                    <td>{{ $receipt->products->sum('stock') + $receipt->products->sum('stock_defective') }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('receipts.show', $receipt) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Ver Receipt">
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
@endsection

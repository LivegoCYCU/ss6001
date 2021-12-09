@extends('layouts.app', ['page' => trans('sidebar.sales'), 'pageSlug' => 'sales', 'section' => 'transactions'])

@section('content')
    @include('alerts.success')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ trans('sidebar.sales') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('sales.create') }}" class="btn btn-sm btn-primary">{{ trans('button.add') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table">
                            <thead>
                                <th>{{ trans('sales.date') }}</th>
                                <th>{{ trans('sales.client') }}</th>
                                <th>{{ trans('sales.user') }}</th>
                                <th>{{ trans('sales.products') }}</th>
                                <th>{{ trans('sales.total_stock') }}</th>
                                <th>{{ trans('sales.total_amount') }}</th>
                                <th>{{ trans('sales.status') }}</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    @if( $sale->client != null)
                                        <tr>
                                            <td>{{ date('d-m-y', strtotime($sale->created_at)) }}</td>
                                            <td><a href="{{ route('clients.show', $sale->client) }}">{{ $sale->client->name }}<br>{{ $sale->client->document_type }}-{{ $sale->client->document_id }}</a></td>
                                            <td>{{ $sale->user->name }}</td>
                                            <td>{{ $sale->products->count() }}</td>
                                            <td>{{ $sale->products->sum('qty') }}</td>
                                            <td>{{ format_money($sale->transactions->sum('amount')) }}</td>
                                            <td>
                                                @if (!$sale->finalized_at)
                                                    <span class="text-danger">{{ trans('auth.to_finalize') }}</span>
                                                @else
                                                    <span class="text-success">{{ trans('auth.finalize') }}</span>
                                                @endif
                                            </td>
                                            <td class="td-actions text-right">
                                                @if (!$sale->finalized_at)
                                                    <a href="{{ route('sales.show', ['sale' => $sale]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.edit') }}">
                                                        <i class="tim-icons icon-pencil"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('sales.show', ['sale' => $sale]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.show') }}">
                                                        <i class="tim-icons icon-zoom-split"></i>
                                                    </a>
                                                @endif
                                                <form action="{{ route('sales.destroy', $sale) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.delete') }}" onclick="confirm('Are you sure you want to delete this sale? All your records will be permanently deleted.') ? this.parentElement.submit() : ''">
                                                        <i class="tim-icons icon-simple-remove"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $sales->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

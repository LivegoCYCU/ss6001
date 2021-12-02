@extends('layouts.app', ['page' => trans('sidebar.header.receipts'), 'pageSlug' => 'receipts', 'section' => 'inventory'])

@section('content')
    @include('alerts.success')
    <div class="row">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ trans('sidebar.header.receipts') }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('receipts.create') }}" class="btn btn-sm btn-primary">{{ trans('receipts.new') }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table">
                        <thead>
                            <th>{{ trans('receipts.receipt_summary.date') }}</th>
                            <th>{{ trans('receipts.receipt_summary.title') }}</th>
                            <th>{{ trans('receipts.receipt_summary.provider') }}</th>
                            <th>{{ trans('receipts.receipt_summary.products') }}</th>
                            <th>{{ trans('receipts.receipt_summary.stock') }}</th>
                            <th>{{ trans('receipts.receipt_summary.defective_stock') }}</th>
                            <th>{{ trans('receipts.receipt_summary.status') }}</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($receipts as $receipt)
                                <tr>
                                    <td>{{ date('d-m-y', strtotime($receipt->created_at)) }}</td>
                                    <td style="max-width:150px">{{ $receipt->title }}</td>
                                    <td>
                                        @if($receipt->provider_id)
                                            <a href="{{ route('providers.show', $receipt->provider) }}">{{ $receipt->provider->name }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $receipt->products->count() }}</td>
                                    <td>{{ $receipt->products->sum('stock') }}</td>
                                    <td>{{ $receipt->products->sum('stock_defective') }}</td>
                                    <td>
                                        @if($receipt->finalized_at)
                                        {{ trans('receipts.finalized') }}
                                        @else
                                            <span style="color:red; font-weight:bold;">{{ trans('receipts.to_finalized') }}</span>
                                        @endif
                                    </td>
                                    <td class="td-actions text-right">
                                        @if($receipt->finalized_at)
                                            <a href="{{ route('receipts.show', ['receipt' => $receipt]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.show') }}">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('receipts.show', ['receipt' => $receipt]) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.edit') }}">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                        @endif
                                        <form action="{{ route('receipts.destroy', $receipt) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.delete') }}" onclick="confirm('Estás seguro que quieres eliminar este recibo? Todos sus registros serán eliminados permanentemente, si ya está finalizado el stock de los productos permanecerán.') ? this.parentElement.submit() : ''">
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
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $receipts->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection

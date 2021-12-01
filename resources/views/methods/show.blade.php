@extends('layouts.app', ['page' => trans('method.method_information'), 'pageSlug' => 'methods', 'section' => 'methods'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ trans('method.method_information') }}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>{{ trans('method.method') }} </th>
                            <th>{{ trans('method.description') }} </th>
                            <th>{{ trans('method.transaction') }} </th>
                            <th>{{ trans('method.daily_balance') }} </th>
                            <th>{{ trans('method.weekly_balance') }} </th>
                            <th>{{ trans('method.quarterly_balance') }} </th>
                            <th>{{ trans('method.monthly_balance') }} </th>
                            <th>{{ trans('method.annual_balance') }} </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $method->id }}</td>
                                <td>{{ $method->name }}</td>
                                <td>{{ $method->description }}</td>
                                <td>{{ $method->transactions->count() }}</td>
                                <td>{{ format_money($balances['daily']) }}</td>
                                <td>{{ format_money($balances['weekly']) }}</td>
                                <td>{{ format_money($balances['quarter']) }}</td>
                                <td>{{ format_money($balances['monthly']) }}</td>
                                <td>{{ format_money($balances['annual']) }}</td>
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
                    <h4 class="card-title">{{ trans('method.transaction') }}: {{ $transactions->count() }}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>{{ trans('method.date') }}</th>
                            <th>{{ trans('method.type') }}</th>
                            <th>{{ trans('method.title') }}</th>
                            <th>{{ trans('method.amount') }}</th>
                            <th>{{ trans('method.reference') }}</th>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ date('d-m-y', strtotime($transaction->created_at)) }}</td>
                                    <td><a href="{{ route('transactions.type', $transaction->type) }}">{{ $transactionname[$transaction->type] }}</a></td>
                                    <td>{{ $transaction->title }}</td>
                                    <td>{{ format_money($transaction->amount) }}</td>
                                    <td>{{ $transaction->reference }}</td>
                                    <td class="td-actions text-right">
                                        @if ($transaction->sale_id)
                                            <a href="{{ route('sales.show', $transaction->sale) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.detail') }}">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                        @elseif ($transaction->transfer_id)

                                        @else
                                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.edit') }}">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('transactions.destroy', $transaction) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ trans('button.delete') }}" onclick="confirm('{{trans("method.delete_transaction_meg")}}') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        @endif
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
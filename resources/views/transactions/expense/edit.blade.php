@extends('layouts.app', ['page' => trans('sidebar.header.edit_expense') , 'pageSlug' => 'expenses', 'section' =>
'transactions'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ trans('sidebar.header.edit_expense') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('transactions.type', ['type' => 'expense']) }}"
                                    class="btn btn-sm btn-primary">{{ trans('button.back') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('transactions.update', $transaction) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <input type="hidden" name="type" value="{{ $transaction->type }}">
                            <input type="hidden" name="user_id" value="{{ $transaction->user_id }}">
                            <h6 class="heading-small text-muted mb-4">{{ trans('expense.information') }} </h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                        for="input-title">{{ trans('expense.title') }}</label>
                                    <input type="text" name="title" id="input-title"
                                        class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Title') }}"
                                        value="{{ old('title', $transaction->title) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'title'])
                                </div>

                                <div class="form-group{{ $errors->has('payment_method_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                        for="input-method">{{ trans('expense.method') }}</label>
                                    <select name="payment_method_id" id="input-method"
                                        class="form-select form-control-alternative{{ $errors->has('payment_method_id') ? ' is-invalid' : '' }}"
                                        required>
                                        @foreach ($payment_methods as $payment_method)
                                            @if ($payment_method['id'] == old('payment_method_id') or $payment_method['id'] == $transaction->payment_method_id)
                                                <option value="{{ $payment_method['id'] }}" selected>
                                                    {{ $payment_method['name'] }}</option>
                                            @else
                                                <option value="{{ $payment_method['id'] }}">{{ $payment_method['name'] }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'payment_method_id'])
                                </div>


                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="input-receipt_id">{{ trans('transaction.receipt_title') }}</label>
                                    <select name="receipt_id" id="input-receipt_id"
                                        class="form-select text-dark custom-select" required>
                                        <option value selected>{{ trans('auth.null') }}</option>
                                        @foreach ($receipts as $receipt)
                                            
                                            @if ($receipt->id == old('receipt_id') or $receipt->id  == $transaction->receipt_id)
                                                <option value="{{ $receipt->id }}" selected>{{ $receipt->title }}</option>
                                            @else
                                                <option value="{{ $receipt->id }}">{{ $receipt->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'payment_method_id'])
                                </div>


                                <div class="form-group{{ $errors->has('amount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                        for="input-amount">{{ trans('expense.amount') }}</label>
                                    <input type="number" step=".01" name="amount" id="input-amount"
                                        class="form-control form-control-alternative" placeholder="Amount"
                                        value="{{ old('amount', abs($transaction->amount)) }}" min="0" required>
                                    @include('alerts.feedback', ['field' => 'amount'])
                                </div>

                                <div class="form-group{{ $errors->has('reference') ? ' has-danger' : '' }}">
                                    <label class="form-control-label"
                                        for="input-reference">{{ trans('expense.reference') }}</label>
                                    <input type="text" name="reference" id="input-reference"
                                        class="form-control form-control-alternative{{ $errors->has('reference') ? ' is-invalid' : '' }}"
                                        placeholder="Reference" value="{{ old('reference', $transaction->reference) }}">
                                    @include('alerts.feedback', ['field' => 'reference'])
                                </div>


                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-success mt-4">{{ trans('button.save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush('js')

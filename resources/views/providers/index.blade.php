@extends('layouts.app', ['page' => trans("sidebar.header.providers"), 'pageSlug' => 'providers', 'section' =>
'providers'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ trans('sidebar.providers') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('providers.create') }}" class="btn btn-sm btn-primary">{{ trans("providers.create") }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
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
                                @foreach ($providers as $provider)
                                    <tr>
                                        <td>{{ $provider->name }}</td>
                                        <td>{{ $provider->company }}</td>
                                        <td>{{ $provider->LINE }}</td>
                                        <td>
                                            <a href="mailto:{{ $provider->email }}">{{ $provider->email }}</a>
                                        </td>
                                        <td>{{ $provider->phone }}</td>
                                        <td>{{ format_money(abs($provider->transactions->sum('amount'))) }}</td>
                                        <td>{{ format_money(abs($provider->transactions->sum('amount'))) }}</td>
                                        <td>{{ $provider->description }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('providers.show', $provider) }}" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="{{ trans('providers.more_details') }}">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('providers.edit', $provider) }}" class="btn btn-link"
                                                data-toggle="tooltip" data-placement="bottom"
                                                title="{{ trans('providers.edit') }}">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('providers.destroy', $provider) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip"
                                                    data-placement="bottom" title="{{ trans('providers.delete') }}"
                                                    onclick="confirm('{{ trans('providers.delete_message') }}') ? this.parentElement.submit() : ''">
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
                        {{ $providers->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app', ['page' => trans('inventory.new_product'), 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ trans('inventory.new_product') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ trans("button.back") }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.product.shopee.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ trans('inventory.information') }}</h6>
                            <div class="pl-lg-4">


                                <div class="form-group{{ $errors->has('product_category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ trans('inventory.category') }}</label>
                                    <select name="product_category_id" id="input-category" class="form-select form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($categories as $category)
                                            @if($category['id'] == old('document'))
                                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                            @else
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'product_category_id'])
                                </div>

                                <div class="form-group{{ $errors->has('shopee_item_url') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-shopee_item_url">{{ trans('inventory.shopee_item_url') }}</label>
                                    <input type="text" name="shopee_item_url" id="input-shopee_item_url" class="form-control form-control-alternative" placeholder="{{ trans('inventory.shopee_item_url') }}" value="{{ old('shopee_item_url') }}" >
                                    @include('alerts.feedback', ['field' => 'shopee_item_url'])
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ trans('inventory.description') }}</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative" placeholder="{{ trans('inventory.description') }}" value="{{ old('description') }}" >
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>

                                <div class="row">
      
                                    <div class="col-3">                                    
                                        <div class="form-group{{ $errors->has('cost') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-cost">{{ trans('inventory.cost') }}</label>
                                            <input type="number" step=".01" name="cost" id="input-cost" class="form-control form-control-alternative" placeholder="{{ trans('inventory.cost') }}" value="{{ old('cost') }}" required>
                                            @include('alerts.feedback', ['field' => 'cost'])
                                        </div>
                                    </div>                    
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ trans('button.save') }}</button>
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
@endpush
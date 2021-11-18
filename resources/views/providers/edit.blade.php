@extends('layouts.app', ['page' => trans("providers.edit"), 'pageSlug' => 'providers', 'section' => 'providers'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ trans("providers.edit") }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('providers.index') }}" class="btn btn-sm btn-primary">{{ trans('button.back')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('providers.update', $provider) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ trans("providers.create_title") }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ trans("providers.edit") }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" value="{{ old('name', $provider->name) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('company') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-company">{{ trans("providers.company") }}</label>
                                    <input type="text" name="company" id="input-company" class="form-control form-control-alternative{{ $errors->has('company') ? ' is-invalid' : '' }}" placeholder="company" value="{{ old('company', $provider->company) }}" required>
                                    @include('alerts.feedback', ['field' => 'company'])
                                </div>
                                <div class="form-group{{ $errors->has('LINE') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ trans("providers.LINE") }}</label>
                                    <input type="text" name="LINE" id="input-LINE" class="form-control form-control-alternative{{ $errors->has('LINE') ? ' is-invalid' : '' }}" placeholder="LINE" value="{{ old('LINE', $provider->LINE) }}" required>
                                    @include('alerts.feedback', ['field' => 'LINE'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ trans("providers.email") }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email', $provider->email) }}" required>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone">{{ trans("providers.telephone") }}</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Telephone" value="{{ old('emphoneail', $provider->phone) }}" required>
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ trans("providers.description") }}</label>
                                    <textarea type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Description" value="{{ old('description', $provider->description) }}" required></textarea>
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.new_withdraw') }}
@endsection
@section('page_css')
{{--    <link href="{{ asset('assets/css/jquery.toast.min.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{ asset('assets/css/bill.css') }}" rel="stylesheet" type="text/css"/>--}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('invoices.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                    <div class="alert alert-danger d-none hide" id="invoicesErrorsBox"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                     <div class="row">
                <div class="col-sm-6 col-12">
                    <div class="mb-sm-0 mb-6">

                    	<form action="{{url('/')}}/withdrawstore" method="post">
                    		@csrf
                       {{ Form::label('amount', __('messages.invoice.amount').(':'),['class' => 'form-label']) }}
                            <span class="required"></span>
                            {{ Form::text('amount', null, ['class' => (getLoggedInUser()->thememode ? 'bg-light form-control' : 'bg-white form-control'), 'id' => 'amount', 'autocomplete' => 'off','required']) }}

<div class="d-flex justify-content-end mt-3">

   <button type="submit" class="btn btn-primary  ">  {{__('messages.common.save')}}</button>

    <a href="{{ url('/')}}/withdraw"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>

                            </form>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('page_scripts')
    {{--  assets/js/moment.min.js --}}
@endsection
@section('scripts')
    {{--  assets/js/custom/input_price_format.js --}}
    {{--  assets/js/invoices/new.js --}}
@endsection

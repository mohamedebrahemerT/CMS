@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.invoices') }}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        {{Form::hidden('invoiceUrl',route('invoices.index'),['id'=>'indexInvoiceUrl'])}}
        {{Form::hidden('patientUrl',url('patients'),['id'=>'indexPatientUrl'])}}
        {{ Form::hidden('invoices', __('messages.invoices'), ['id' => 'Invoices']) }}
        <div class="d-flex flex-column">
   
            <div class="container">
   @include('layouts.errors')
                <a href="{{url('/')}}/withdraw/create" class="btn btn-primary"  >سحب  من الخزنه الفرعيه  الي الخزنة الرئيسية    </a>
   
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th> المعرف </th>
                <th> المبلغ </th>
                <th> التاريخ</th>
                <th> الوقت</th>
          
                
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        </div>
    </div>
@endsection
@section('page_scripts')
    {{-- assets/js/moment.min.js --}}
@endsection
@section('scripts')
    {{-- assets/js/custom/input_price_format.js --}}
    {{-- assets/js/invoices/invoice.js --}}
 


@endsection

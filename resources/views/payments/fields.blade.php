<div class="row">


 <div class="col-sm-6 mb-5">
        {{ Form::label('amount', __('messages.payment.amount').(':'),['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('amount', null, ['class' => 'form-control price-input price', 'required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
    </div>

     <div class="col-sm-6 mb-5">
        {{ Form::label('payment_date', __('messages.payment.payment_date').(':'),['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('payment_date', null, ['id'=>'paymentDate', 'class' => (getLoggedInUser()->thememode ? 'bg-light form-control' : 'bg-white form-control'), 'required','autocomplete' => 'off']) }}
    </div>

  <input type="hidden" name="account_id" value="{{App\Models\Account::first()->id}}">
   
    <div class="col-sm-12 mb-5">
        {{ Form::label('pay_to', __('messages.payment.pay_to').(':'),['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('pay_to', null, ['class' => 'form-control', 'required']) }}
    </div>
   
    
</div>
<div class="d-flex justify-content-end">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3','id' => 'btnPaymentSave']) !!}
    <a href="{!! route('payments.index') !!}"
       class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a>
</div>

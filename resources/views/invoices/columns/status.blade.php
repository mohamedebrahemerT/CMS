<div class="d-flex align-items-center">
    @if ($row->status == '0')
        <span class="badge bg-light-primary fs-7">{{ __('messages.invoice.Paid') }}</span>
    @elseif ($row->status === '1')
        <span class="badge bg-light-warning fs-7">اجل</span>

         @elseif ($row->status == '3')
        <span class="badge bg-light-warning fs-7"> فيزا </span>

         
    @endif    
</div>


<div class="d-flex justify-content-end pe-22">
    @if(!empty($row->amount))
        <p class="cur-margin">
        {{ getCurrencySymbol() }} {{ number_format($row->amount - ($row->amount * $row->discount / 100),2)}}
     </p>
    @else
        N/A
    @endif    
</div>


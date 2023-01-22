<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" type="image/png" href="http://top-gift.original-trade.net/public/logo/Artboard%202-8.png"  />

    <title>  عيادات  بروسيا  </title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="all,follow">



    <style type="text/css">

        * {

            font-size: 13px;

        

            font-family: 'Ubuntu', sans-serif;

            text-transform: capitalize;

            text-align: center;

            font-family: 'Tajawal', sans-serif;

        }

        .btn {

            padding: 7px 10px;

            text-decoration: none;

            border: none;

            display: block;

            text-align: center;

            margin: 7px;

            cursor:pointer;

        }



        .btn-info {

            background-color: #999;

            color: #FFF;

        }



        .btn-primary {

            background-color: #6449e7;

            color: #FFF;

            width: 100%;

        }

        td,

        th,

        tr,

        table {

            border-collapse: collapse;

        }

    

 



        table {width: 100%;

direction: rtl;

text-align: center;

        }

        tfoot tr th:first-child {text-align: left;}



        .centered {

            text-align: center;

            align-content: center;

        }

        small{font-size:11px;}



        @media    print {

            * {

                font-size:12px;

                line-height: 20px;

            }

            td,th {padding: 5px 0;}

            .hidden-print {

                display: none !important;

            }

            @page    { margin: 0; } body { margin: 0.5cm; margin-bottom:1.6cm; } 

        }
.rotate {
  -webkit-transform: rotate(20deg);
  transform: rotate(90deg);
}
    </style>

     <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet"> 

  </head>

<body style="font-family: 'Tajawal', sans-serif;">

<br>
<br>

<div style="max-width: 411px;
margin: 0 auto;
border: 1px solid;
padding: 13px;">

    
        
    
    <div class="hidden-print">

        <table>

            <tr>

                <td><a href="{{url('/')}}/appointments" class="btn btn-info"><i class="fa fa-arrow-left"></i> الى الخلف</a> </td>

                <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> طباعه</button></td>

            </tr>

        </table>

        <br>

    </div>

        

    <div id="receipt-data">

        <table>
            <tbody>
                              </tbody>
        </table>

        <div class="centered">
 
    رقم  الفاتوره  : {{ $Invoice->id }}
        
           
         <div style="width: 50%;float: left;margin-left: -7%;">
{{ getAppName() }} <br>
                            <img style="margin-top:10px;" src="{{ getLogoUrl() }}"   />    
                         
         </div>
            
     

        
    <div style="width: 50%;float: left; font-size: 12px">
             <h1 > 
                           </h1>

            

            <p>      اسم المريض   :  {{$Invoice->patient->patientUser->full_name}}
   <br> 
                 الهاتف :   {{ $Invoice->patient->patientUser->phone }}  
                    <br>  
  
 
                  التاريخ :{{ \Carbon\Carbon::parse($Invoice->invoice_date)->translatedFormat('jS M, Y') }}
                 <br>
  


            </p>
 
 
   
        </div>

       
              
          </div>


   <table style="  border: 1px solid black !important; ">
       <thead>
                    <tr class="border-bottom fs-6  text-muted">
                        
                        <th class="pb-2">{{ __('messages.invoice.description') }}</th>
                        <th class="text-end pb-2">{{ __('messages.invoice.qty') }}</th>
                        <th class="text-end pb-2">{{ __('messages.invoice.price') }}</th>
                        <th class="text-end pb-2">{{ __('messages.invoice.amount') }}</th>
                    </tr>
                    </thead>


            <tbody>

                   
                  @foreach($Invoice->invoiceItems as $index => $invoiceItem)
                        <tr  >
                            
                            <td style="  border: 1px solid black !important;">{!! ($invoiceItem->description != '')?nl2br(e($invoiceItem->description)):'N/A' !!}</td>
                            <td style="  border: 1px solid black !important;">{{ $invoiceItem->quantity }}</td>
                            <td style="  border: 1px solid black !important;"><b>{{ getCurrencySymbol() }}</b> {{ number_format($invoiceItem->price) }}
                            </td>
                            <td style="  border: 1px solid black !important;">
                                <b>{{ getCurrencySymbol() }}</b> {{ number_format($invoiceItem->total) }}</td>
                        </tr>
                    @endforeach
               

                            </tbody>
             
         </table >
     

        <table class="table table-borderless {{ getLoggedInUser()->thememode ? '' : 'bg-white' }} box-shadow-none mb-0 mt-5">
                        <tbody class="{{ getLoggedInUser()->thememode ? '' : 'bg-white' }}">
                        <tr  style="background-color:#ddd;">
                            <td class="{{ getLoggedInUser()->thememode ? '' : 'bg-white' }} ps-0">{{ __('messages.invoice.sub_total').(':') }}</td>
                            <td class="{{ getLoggedInUser()->thememode ? '' : 'bg-white' }} text-gray-900 text-end pe-0">{{ getCurrencySymbol() }} {{ number_format($Invoice->amount,2) }}</td>
                        </tr>
                        <tr  style="background-color:#ddd;">
                            <td class="{{ getLoggedInUser()->thememode ? '' : 'bg-white' }} ps-0">{{ __('messages.invoice.discount').(':') }}</td>
                            <td class="{{ getLoggedInUser()->thememode ? '' : 'bg-white' }} text-gray-900 text-end pe-0">{{ getCurrencySymbol() }} {{ number_format(($Invoice->amount * $Invoice->discount / 100),2) }}</td>
                        </tr>
                        <tr  style="background-color:#ddd;">
                            <td class="{{ getLoggedInUser()->thememode ? '' : 'bg-white' }} ps-0">{{ __('messages.invoice.total').(':') }}</td>
                            <td class="{{ getLoggedInUser()->thememode ? '' : 'bg-white' }} text-gray-900 text-end pe-0">{{ getCurrencySymbol() }} {{ number_format($Invoice->amount - ($Invoice->amount * $Invoice->discount / 100),2)}}</td>
                        </tr>
                        </tbody>
                    </table>

        <!-- <div class="centered" style="margin:30px 0 50px">

            <small>فاتورة ولدت من قبل توب جفت.

            طورت بواسطة LionCoders</strong></small>

        </div> -->

    </div>

</div>



<script type="text/javascript">

    function auto_print() {     

        window.print()

    }

    setTimeout(auto_print, 1000);

</script>



</body>

</html>


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
 
    

           
         <div style="width: 50%;float: left;margin-left: -7%;">

                            <img style="margin-top:10px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFcAAABXAQMAAABLBksvAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAXxJREFUOI190z2OwjAQBeCJKOjwDZyLWMq1oCErcQ+4ClxgfYV0aS25caTIb9844ScB1kX0FWN7xjMRYLSmuaBBln8MojiIQ2ri1clu4QinAd7hVx2x/eJnzAa6990AnvZfjaRmDsH0eT/n8zBzjoy55x+9i/6DoUepuXLrai/TejjvWTgYE5P65BHkzS14VzDgOdb0oRqDGe1uYZ6Rq5GRjImpyeLygSUszaDbqNclEdOfbky1i0uHcpdmzl60rBe5He1xYc0Hd1d92dVpLa/WGH77S1b/tJLN9t1ABxQbltDVSex+YUzJoFPf8FOpZeWB1rLOR6kH3t7kCufdwjykvhYf+Q60WHGyNl+G7VBv0jZ+coGuyHe+NhffieHYrA3f6ziVvke1rKxFsTSOymQOnndh/2b2i/Nc/gtbsUcyzeTDnNV6OipPdtYgHNdm8radY3IrwqlLazOmHuaYTaK7+d95cRz0zad84tCV7Qvr/A+cDQ6wOhxwNiv/AfXWftv5J7HxAAAAAElFTkSuQmCC" alt="barcode"   />    
                         
         </div>
            
     

        
    <div style="width: 50%;float: left; font-size: 12px">
             <h1 > 
                           </h1>

            

            <p>      اسم المريض   :  {{$row->patient->patientUser->full_name}}
   <br> 
                 الهاتف :   {{ $row->patient->patientUser->phone }}  
                    <br>  
  
 
                 الوقت : :{{ \Carbon\Carbon::parse($row->opd_date)->isoFormat('LT')}}
                 <br>
               التاريخ :{{ \Carbon\Carbon::parse($row->opd_date)->translatedFormat('jS M, Y')}}    
   <br>
   القسم :{{$row->department->title}}
     <br>
     الطبيب   :
     {{ $row->doctor->doctorUser->full_name }}


            </p>
 
 
   
        </div>

       
              
          </div>


   <table style="  border: 1px solid black !important; ">
        <thead>
             
            </thead>



            <tbody>

                   
                 
               

                            </tbody>
             
         </table >
     

        <table>

            <tbody>

                
              

 
          


                  <tr style="background-color:#ddd;">

                    <td style="padding: 5px;width:30%;  border: 1px solid black !important;">    رقم  الحجز   

                    </td>

                    <td style="padding: 5px;width:40%;  border: 1px solid black !important;">    {{ $row->id }} </td>
 
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


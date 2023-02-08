@if(!empty($errors))
    @if($errors->any())
        <div class="alert alert-danger">
            <div>
                <div class="d-flex">
                    <i class="fa-solid fa-face-frown me-5"></i>
                    <span class="mt-1">{{$errors->first()}}</span>
                </div>
            </div>
        </div>
    @endif
@endif

 @if(session('success'))
   <div class="alert alert-success ">
   {{session('success')}}

     </div>
   @endif

          @if(session('danger'))
   <div class="alert alert-danger ">
   {{session('danger')}}

     </div>
   @endif


   
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Auth::user()->hasRole('Admin'))
    <div class="d-flex align-items-center py-1">
        <a href="{{ route('appointments.create') }}"
           class="btn btn-primary">{{ __('messages.appointment.new_appointment') }}</a>
    </div>

&nbsp; &nbsp; 
     <div class="d-flex align-items-center py-1">
        <a  onclick="document.getElementById('id01').style.display='block'"
           class="btn btn-primary">{{ __('messages.patient.new_patient') }}</a>
    </div>

<link rel="stylesheet" href="{{url('/')}}/css/w3.css">
 
 
 
 
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
       
                {{Form::hidden('utilsScript',asset('assets/js/int-tel/js/utils.min.js'),['class'=>'utilsScript'])}}
                {{Form::hidden('isEdit',false,['class'=>'isEdit'])}}
                {{Form::hidden('defaultAvatarImageUrl',asset('assets/img/avatar.png'),['class'=>'defaultAvatarImageUrl'])}}
                <div class="card-body p-12">
                    {{ Form::open(['route' => 'patients.store', 'files' => 'true', 'id' => 'createPatientForm']) }}
                    @include('patients.fields')
                    {{ Form::close() }}
                </div>
          

      </div>
    </div>
  </div>

@endif



@if (Auth::user()->hasRole('Doctor'))
    <div class="d-flex align-items-center py-1">
        <a data-turbo="false" href="{{ route('appointments.excel') }}"
           class="btn btn-primary">{{ __('messages.common.export_to_excel') }}</a>
    </div>
@endif
@if (Auth::user()->hasRole('Patient|Receptionist'))
    <div class="dropdown pt-1">
        <a href="#" class="btn btn-primary" id="dropdownMenuButton" data-bs-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}
            <i class="fa-solid fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li>
                <a href="{{ route('appointments.create') }}" class="dropdown-item  px-5">
                    {{ __('messages.appointment.new_appointment') }}
                </a>
            </li>
            <li>
                <a href="{{ route('appointments.excel') }}" class="dropdown-item  px-5" data-turbo="false">
                    {{ __('messages.common.export_to_excel') }}
                </a>
            </li>
        </ul>
    </div>
@endif

 
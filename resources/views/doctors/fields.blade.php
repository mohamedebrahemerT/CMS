<div class="alert alert-danger d-none hide" id="customValidationErrorsBox"></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('first_name',__('messages.user.first_name').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('first_name', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
   
    <div class="form-group col-sm-6  mb-5">
        {{ Form::label('department_name', __('messages.doctor_department.doctor_department').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::select('doctor_department_id', $doctorsDepartments, null, ['class' => 'form-select', 'id' => 'doctorsDepartmentId', 'placeholder' => 'Select Department', 'data-control' => 'select2','required']) }}
    </div>
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('email',__('messages.user.email').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::email('email', null, ['class' => 'form-control','required','id'=>'createAccountantEmail']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('designation', __('messages.user.designation').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('designation', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
 
   <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('phone',__('messages.user.phone').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('phone', null, ['class' => 'form-control','required']) }}
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group mb-5">
            {{ Form::label('gender',__('messages.user.gender').(':'), ['class' => 'form-label']) }}
            <span class="required"></span> &nbsp;<br>
            <div class="d-flex align-items-center">
                <div class="form-check me-10">
                    <label class="form-label" for="doctorMale">{{ __('messages.user.male') }}</label>
                    {{ Form::radio('gender', '0', true, ['class' => 'form-check-input','id'=>'doctorMale']) }}
                </div>
                <div class="form-check me-10">
                    <label class="form-label" for="doctorFemale">{{ __('messages.user.female') }}</label>&nbsp;
                    {{ Form::radio('gender', '1',false, ['class' => 'form-check-input','id'=>'doctorFemale']) }}
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-3">
        <div class="form-group mb-5">
            {{ Form::label('status',__('messages.common.status').(':'), ['class' => 'form-label']) }}
            <br>
            <div class="form-check form-switch">
                <input class="form-check-input is-active" name="status" type="checkbox" value="1"
                       tabindex="8" checked>
            </div>
        </div>
    </div>



    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('specialist', __('messages.doctor.specialist').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('specialist', (isset($doctor) ? $doctor->specialist : ''), ['class' => 'form-control','required']) }}
        </div>
    </div>
    
 
<div class="d-flex justify-content-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
    <a href="{{ route('accountants.index') }}"
       class="btn btn-secondary">{{__('messages.common.cancel')}}</a>
</div>


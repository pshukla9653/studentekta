@extends('layouts.app')


@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h2>Update User</h2>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
      </div>

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Edit User</h6>
         

          <div class="form-layout form-layout-1">
		  {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
              </div><!-- col-4 -->
             
			  <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                  {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
              </div><!-- col-4 -->
			   <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                  {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info">Submit</button>
            </div><!-- form-layout-footer -->
			
          </div><!-- form-layout -->

{!! Form::close() !!}
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
@endsection
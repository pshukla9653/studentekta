@extends('layouts.app')


@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h2>Edit Role</h2>
          
        </div>
		 <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
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
          <h6 class="br-section-label">Edit Role</h6>
         

          <div class="form-layout form-layout-1">
		 {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
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
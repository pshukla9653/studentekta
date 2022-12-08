@extends('layouts.app')


@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h2>Edit Semester</h2>
          
        </div>
		 <div class="pull-right">
            
                <a class="btn btn-success" href="{{ route('semesters.index') }}"> Back</a>
               
        </div>
</div>

    @if ($errors->any())
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
          <h6 class="br-section-label">Edit semester</h6>

    <form action="{{ route('semesters.update',$semester->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $semester->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
		   <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="status">
                    <option value="1" {{ $semester->status =='1'?'selected':'' }}>Active</option>
                    <option value="0" {{ $semester->status =='0'?'selected':'' }}>Inactive</option>
                   
                  </select>
                </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
</div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
@endsection
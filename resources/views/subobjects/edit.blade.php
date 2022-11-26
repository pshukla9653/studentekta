@extends('layouts.app')
@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h2>Update Sub Object</h2>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
            @can('country-list')
                <a class="btn btn-success" href="{{ route('subobjects.index') }}"> Back</a>
                @endcan
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
          <h6 class="br-section-label">Edit Sub Object</h6>
    <form action="{{ route('subobjects.update', $subobject->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="country_id">
				  <option value="">Select</option>
                    @foreach($countries as $country)
					<option value="{{$country->id}}" {{$subobject->country_id==$country->id?'selected':''}}>{{$country->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="state_id" id="state-dd">
				  <option value="">Select</option>
					@foreach($states as $state)
					<option value="{{$state->id}}" {{$subobject->state_id==$state->id?'selected':''}}>{{$state->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
						<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="city_id" id="state-dd">
				  <option value="">Select</option>
					@foreach($cities as $city)
					<option value="{{$city->id}}" {{$subobject->city_id==$city->id?'selected':''}}>{{$city->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Board: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="board_id" >
				  <option value="">Select</option>
                    @foreach($boards as $board)
					<option value="{{$board->id}}" {{$subobject->board_id==$board->id?'selected':''}}>{{$board->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Exam: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="exam_id" >
				  <option value="">Select</option>
                    @foreach($exams as $exam)
					<option value="{{$exam->id}}" {{$subobject->exam_id==$exam->id?'selected':''}}>{{$exam->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Course: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="course_id" >
				  <option value="">Select</option>
                    @foreach($courses as $course)
					<option value="{{$course->id}}" {{$subobject->course_id==$course->id?'selected':''}}>{{$course->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Profession: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="profession_id" >
				  <option value="">Select</option>
                    @foreach($professions as $profession)
					<option value="{{$profession->id}}" {{$subobject->profession_id==$profession->id?'selected':''}}>{{$profession->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Class: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="stclass_id" >
				  <option value="">Select</option>
                    @foreach($stclasses as $stclass)
					<option value="{{$stclass->id}}" {{$subobject->stclass_id==$stclass->id?'selected':''}}>{{$stclass->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$subobject->name}}">
		        </div>
		    </div>
		    
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="status">
                    <option value="1" {{$subobject->status=='1'?'selected':''}}>Active</option>
                    <option value="0" {{$subobject->status=='0'?'selected':''}}>Inactive</option>
                   
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
<script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        
                    }
                });
            });
            });
       
    </script>
@endsection
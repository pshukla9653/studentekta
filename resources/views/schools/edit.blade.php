@extends('layouts.app')
@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h2>Update School</h2>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('schools.index') }}"> Back</a>
             
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
          <h6 class="br-section-label">Edit School</h6>
    <form action="{{ route('schools.update', $school->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="country_id">
				  <option value="">Select</option>
                    @foreach($countries as $country)
					<option value="{{$country->country_id}}" {{$school->country_id==$country->country_id?'selected':''}}>{{$country->country_name}}</option>
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
					<option value="{{$state->id}}" {{$school->state_id==$state->id?'selected':''}}>{{$state->state_name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="city_id" id="city-dd">
				  <option value="">Select</option>
					@foreach($cities as $city)
					<option value="{{$city['id']}}" {{$school->city_id==$city['id']?'selected':''}}>{{$city['name']}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
						<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Board: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="board_id">
				  <option value="">Select</option>
					@foreach($boards as $board)
					<option value="{{$board->id}}" {{$school->board_id==$board->id?'selected':''}}>{{$board->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$school->name}}">
		        </div>
		    </div>
		    
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="status">
                    <option value="1" {{$school->status=='1'?'selected':''}}>Active</option>
                    <option value="0" {{$school->status=='0'?'selected':''}}>Inactive</option>
                   
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
                $('#state-dd').html('<option value="">Select State</option>');
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
                                .id + '">' + value.state_name + '</option>');
                        });

                    }
                });
            });
			
			$('#state-dd').on('change', function () {
                var idState = this.value;
                
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
						if(result.cities ==null){
							$('#city-dd').html('<option value="">No City Found</option>');
						}
						else{
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(result.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
						}
                    },
					
                });
            });
			$('#city-dd').on('change', function () {
                var idState = $('#state-dd').val();
                
                $.ajax({
                    url: "{{url('api/fetch-universities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
						if(result.universities ==null){
							$('#university-dd').html('<option value="">No University Found</option>');
						}
						else{
                        $('#university-dd').html('<option value="">Select University</option>');
                        $.each(result.universities, function (key, value) {
                            $("#university-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
						}
                    },
					
                });
            });
            });
       
    </script>
@endsection
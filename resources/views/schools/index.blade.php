@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>School Management</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('schools.create') }}"> Create New School</a>            
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Schools List</h6>
		  <div class="pull-right" style="text-align: end;">
           <h4>Total Count: {{$schoolscount}}</h4>            
        </div>
		  <div class="form-layout form-layout-1">
		  <form action="{{ route('schools.index') }}" method="PUT">
			@csrf
			 <h4 class="br-section-label">Filter By:</h4>
            <div class="row mg-b-5">
            
		  
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" id="country-dd" name="country_search">
				  <option value="">Select</option>
                   @foreach($countries as $country)
					<option value="{{$country->country_id}}">{{$country->country_name}}</option>
                   @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
			  
			  <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose state" id="state-dd" name="state_search">
                    
                  </select>
                </div>
              </div><!-- col-4 -->
			  <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose city" id="city-dd" name="city_search">
                    
                  </select>
                </div>
              </div><!-- col-4 -->
			  <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Board: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose board" name="board_search">
                    <option value="">Select</option>
                   @foreach($boards as $board)
					<option value="{{$board->id}}">{{$board->name}}</option>
                   @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <input type="submit" class="btn btn-primary" value="Search" name="btn">
              
            </div><!-- form-layout-footer -->
			</form>
          </div><!-- form-layout -->
			<br>
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
            <th>Name</th>
            <th>Country</th>
			<th>State</th>
			<th>City</th>
			<th>Board</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($schools as $school)
		
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $school->name }}</td>
	        <td>{{ $school->state->country_name }}</td>
			<td>{{ $school->state->state_name }}</td>
			<td>
			@php
				$city = json_decode($school->state->cities, true);
				$key = array_search($school->city_id, array_column($city, 'id'));
			@endphp
			{{$city[$key]['name']}}
			</td>
			<td>{{ $school->board->name }}</td>
			<td>@if($school->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
				<td>{{ $school->created_at }}</td>
				<td>{{ $school->updated_at }}</td>
	        <td>
                <form action="{{ route('schools.destroy',$school->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('schools.show',$school->id) }}">Show</a>
                  
                    <a class="btn btn-primary" href="{{ route('schools.edit',$school->id) }}">Edit</a>
                   
                    @csrf
                    @method('DELETE')
                   
                    <button type="submit" class="btn btn-danger">Delete</button>
                   
                </form>
	        </td>
	    </tr>
	    @endforeach
		</tbody>
		</table>

          

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
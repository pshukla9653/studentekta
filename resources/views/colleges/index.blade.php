@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>College Management</h4>
          
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('colleges.create') }}"> Create New College</a> 
				<a class="btn btn-success" href="{{ route('import-colleges') }}"> Import Colleges</a> 				
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
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
          <h6 class="br-section-label">Colleges List</h6>
		  <div class="pull-right" style="text-align: end;">
           <h4>Total Count: {{$collegescount}}</h4>            
        </div>
		  <div class="form-layout form-layout-1">
		  <form action="{{ route('colleges.index') }}" method="PUT">
			@csrf
			<h4 class="br-section-label" style="margin-top: 0px;">Filter By:</h4>
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
                  <label class="form-control-label">University: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose university" id="university-dd" name="university_search">
                   
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
            
			<th>University</th>
			<th>Country</th>
			<th>State</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Created By</th>
			<th>Updated By</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($colleges as $college)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $college->name }}</td>
	        
			
			<td>{{ $college->university->name }}</td>
			<td>{{ $college->state->country_name }}</td>
			<td>{{ $college->state->state_name }}</td>
			<td>@if($college->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $college->created_at }}</td>
			<td>{{ $college->updated_at }}</td>	
			<td>
			@php
			if($college->createdby !=null){
				$user = json_decode($college->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($college->updatedby !=null){
				$user = json_decode($college->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	        <td>
                <form action="{{ route('colleges.destroy',$college->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('colleges.show',$college->id) }}">Show</a>
                  
                    <a class="btn btn-primary" href="{{ route('colleges.edit',$college->id) }}">Edit</a>
                   
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
@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Universities Management</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('universities.create') }}"> Create New University</a>            
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Universities List</h6>
		  <div class="pull-right" style="text-align: end;">
           <h4>Total Count: {{$universitiescount}}</h4>            
        </div>
		  <div class="form-layout form-layout-1">
		  <form action="{{ route('universities.index') }}" method="PUT">
			@csrf
			
            <div class="row mg-b-25">
             <h4 class="br-section-label">Filter By:</h4>
		  
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" id="country-dd" name="country_search">
				  <option value="">Select</option>
                   @foreach($countries as $country)
					<option value="{{$country->id}}">{{$country->name}}</option>
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
            <th style="style=width:20%!important;">Name</th>
            
			<th>State</th>
			
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($universities as $university)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $university->name }}</td>

			<td>{{ $university->state->name }}</td>
			
			<td>@if($university->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $university->created_at }}</td>
				<td>{{ $university->updated_at }}</td>	
	        <td>
                <form action="{{ route('universities.destroy',$university->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('universities.show',$university->id) }}">Show</a>
                  
                    <a class="btn btn-primary" href="{{ route('universities.edit',$university->id) }}">Edit</a>
                   
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
                                .id + '">' + value.name + '</option>');
                        });

                    }
                });
            });
			
			
            });
       
    </script>
@endsection
@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>State Management</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('states.create') }}"> Create New State</a>            
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">State List</h6>
		  <div class="pull-right" style="text-align: end;">
           <h4>Total Count: {{$statescount}}</h4>            
        </div>
		    <div class="form-layout form-layout-1">
			<form action="{{ route('states.index') }}" method="PUT">
			@csrf
            <div class="row mg-b-30">
			<h4 class="br-section-label">Filter By:</h4>
		  
			
			<div class="col-xs-8 col-sm-8 col-md-8">
		        <div class="form-group">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="country_search">
				  <option value="">Select</option>
                    @foreach($countries as $country)
					<option value="{{$country->id}}">{{$country->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-4 col-sm-4 col-md-4 text-center">
		            <input type="submit" class="btn btn-primary" value="Search" name="btn">
		    </div>
			
			</form>
			</div>
			</div>
			<br>
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
            <th>Name</th>
            <th>Country</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($states as $state)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $state->name }}</td>
	        <td>{{ $state->country->name }}</td>
			<td>@if($state->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $state->created_at }}</td>
			<td>{{ $state->updated_at }}</td>
	        <td>
                <form action="{{ route('states.destroy',$state->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('states.show',$state->id) }}">Show</a>
                  
                    <a class="btn btn-primary" href="{{ route('states.edit',$state->id) }}">Edit</a>
                   
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
@endsection
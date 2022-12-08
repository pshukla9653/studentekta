@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Universities Management</h4>
          
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('universities.create') }}"> Create New University</a> 
					<a class="btn btn-success" href="{{ route('import-universities') }}"> Import Universities</a>
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
			<th>Country</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Created By</th>
			<th>Updated By</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($universities as $university)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $university->name }}</td>

			<td>{{ $university->state->country_name }}</td>
			<td>{{ $university->state->state_name }}</td>
			<td>@if($university->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $university->created_at }}</td>
				<td>{{ $university->updated_at }}</td>	
				<td>
			@php
			if($university->createdby !=null){
				$user = json_decode($university->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($university->updatedby !=null){
				$user = json_decode($university->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
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
	  
@endsection
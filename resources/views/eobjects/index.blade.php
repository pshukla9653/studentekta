@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Object Management</h4>
          
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('eobjects.create') }}"> Create New Object</a>            
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Object List</h6>
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
            <th>Name</th>
            <th>Country</th>
			<th>State</th>
			<th>City</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Created By</th>
<th>Updated By</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($eobjects as $eobject)
		
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $eobject->name }}</td>
	        <td>{{ $eobject->country->name }}</td>
			<td>{{ $eobject->state->name }}</td>
			<td>{{ $eobject->city->name }}</td>
			<td>@if($eobject->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
				<td>{{ $eobject->created_at }}</td>
				<td>{{ $eobject->updated_at }}</td>
			<td>
			@php
			if($eobject->createdby !=null){
				$user = json_decode($eobject->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($eobject->updatedby !=null){
				$user = json_decode($eobject->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	        <td>
                <form action="{{ route('eobjects.destroy',$eobject->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('eobjects.show',$eobject->id) }}">Show</a>
                  
                    <a class="btn btn-primary" href="{{ route('eobjects.edit',$eobject->id) }}">Edit</a>
                   
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
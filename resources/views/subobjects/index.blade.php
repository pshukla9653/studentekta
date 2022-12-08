@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Sub Object Management</h4>
          
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('subobjects.create') }}"> Create New Sub Object</a>            
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Sub Object List</h6>
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
            <th>Name</th>
            <th>Country</th>
			<th>State</th>
			<th>City</th>
			<th>Board</th>
			<th>Exam</th>
			<th>Course</th>
			<th>Profession</th>
			<th>Class</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Created By</th>
<th>Updated By</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($subobjects as $subobject)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $subobject->name }}</td>
	        <td>{{ $subobject->country->name }}</td>
			<td>{{ $subobject->state->name }}</td>
			<td>{{ $subobject->city->name }}</td>
			<td>{{ $subobject->board->name }}</td>
			<td>{{ $subobject->exam->name }}</td>
			<td>{{ $subobject->course->name }}</td>
			<td>{{ $subobject->profession->name }}</td>
			<td>{{ $subobject->stclass->name }}</td>
			<td>@if($subobject->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
				<td>{{ $subobject->created_at }}</td>
				<td>{{ $subobject->updated_at }}</td>
				<td>
			@php
			if($subobject->createdby !=null){
				$user = json_decode($subobject->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($subobject->updatedby !=null){
				$user = json_decode($subobject->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	        <td>
                <form action="{{ route('subobjects.destroy',$subobject->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('subobjects.show',$subobject->id) }}">Show</a>
                  
                    <a class="btn btn-primary" href="{{ route('subobjects.edit',$subobject->id) }}">Edit</a>
                   
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
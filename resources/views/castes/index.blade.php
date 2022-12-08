@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Caste Management</h4>
          
        </div>
		 <div class="pull-right">
            
                <a class="btn btn-success" href="{{ route('castes.create') }}"> Create New Caste</a>
                
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Castes List</h6>
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
            <th>Name</th>
            <th>Status</th>
			<th>Created At</th>
<th>Updated At</th>
<th>Created By</th>
			<th>Updated By</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($castes as $caste)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $caste->name }}</td>
	        <td>@if($caste->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $caste->created_at }}</td>
<td>{{ $caste->updated_at }}</td>
	        
			<td>
			@php
			if($caste->createdby !=null){
				$user = json_decode($caste->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($caste->updatedby !=null){
				$user = json_decode($caste->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
			<td>
                <form action="{{ route('castes.destroy',$caste->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('castes.show',$caste->id) }}">Show</a>
                    
                    <a class="btn btn-primary" href="{{ route('castes.edit',$caste->id) }}">Edit</a>
                   


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
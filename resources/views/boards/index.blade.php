@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Board Management</h4>
          
        </div>
		 <div class="pull-right">
            
                <a class="btn btn-success" href="{{ route('boards.create') }}"> Create New Board</a>
            
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Boards List</h6>
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
		@foreach ($boards as $board)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $board->name }}</td>
	        <td>@if($board->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $board->created_at }}</td>
<td>{{ $board->updated_at }}</td>
<td>
			@php
			if($board->createdby !=null){
				$user = json_decode($board->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($board->updatedby !=null){
				$user = json_decode($board->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	        <td>
                <form action="{{ route('boards.destroy',$board->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('boards.show',$board->id) }}">Show</a>
                  
                    <a class="btn btn-primary" href="{{ route('boards.edit',$board->id) }}">Edit</a>
                  


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
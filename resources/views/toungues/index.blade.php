@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Mother Toungue Management</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('toungues.create') }}"> Create New toungue</a>
              
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Mother Toungue List</h6>
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
            <th>Name</th>
            <th>Status</th>
			<th>Created At</th>
<th>Updated At</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($toungues as $toungue)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $toungue->name }}</td>
	        <td>@if($toungue->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $toungue->created_at }}</td>
<td>{{ $toungue->updated_at }}</td>	
	        <td>
                <form action="{{ route('toungues.destroy',$toungue->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('toungues.show',$toungue->id) }}">Show</a>
                    
                    <a class="btn btn-primary" href="{{ route('toungues.edit',$toungue->id) }}">Edit</a>
                   

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
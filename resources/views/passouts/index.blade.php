@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Passout Year Management</h4>
          
        </div>
		 <div class="pull-right">
            
                <a class="btn btn-success" href="{{ route('passouts.create') }}"> Create New passout</a>
              
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Passout Year List</h6>
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
		@foreach ($passouts as $passout)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $passout->name }}</td>
	        <td>@if($passout->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $passout->created_at }}</td>
<td>{{ $passout->updated_at }}</td>
<td>
			@php
			if($passout->createdby !=null){
				$user = json_decode($passout->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($passout->updatedby !=null){
				$user = json_decode($passout->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	        <td>
                <form action="{{ route('passouts.destroy',$passout->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('passouts.show',$passout->id) }}">Show</a>
                   
                    <a class="btn btn-primary" href="{{ route('passouts.edit',$passout->id) }}">Edit</a>
                    


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
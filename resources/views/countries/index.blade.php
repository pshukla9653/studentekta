@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Country Management</h4>
          
        </div>
		 <div class="pull-right">
            @can('country-create')
                <a class="btn btn-success" href="{{ route('countries.create') }}"> Create New Country</a>
                @endcan
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Countries List</h6>
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
            <th>Name</th>
            <th>ISD Code</th>
			<th>Status</th>
			<th>Created At</th>
<th>Updated At</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($countries as $country)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $country->name }}</td>
	        <td>{{ $country->isd_code }}</td>
			<td>@if($country->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $country->created_at }}</td>
<td>{{ $country->updated_at }}</td>	
	        <td>
                <form action="{{ route('countries.destroy',$country->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('countries.show',$country->id) }}">Show</a>
                    @can('country-edit')
                    <a class="btn btn-primary" href="{{ route('countries.edit',$country->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('country-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
		</tbody>
		</table>

          

        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
@endsection
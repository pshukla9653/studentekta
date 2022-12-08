@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Chapter Management</h4>
          
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('chapters.create') }}"> Create New Chapter</a>            
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Chapter List</h6>
		  <div class="pull-right" style="text-align: end;">
           <h4>Total Count: {{$chaptercount}}</h4>            
        </div>
		    <div class="form-layout form-layout-1">
			<form action="{{ route('chapters.index') }}" method="PUT">
			@csrf
            <div class="row mg-b-30">
			<h4 class="br-section-label">Filter By:</h4>
		  
			
			<div class="col-xs-8 col-sm-8 col-md-8">
		        <div class="form-group">
                  <label class="form-control-label">Subject: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="chapter_search">
				  <option value="">Select</option>
                   @foreach($subjects as $subject)
					<option value="{{$subject->id}}">{{$subject->name}}</option>
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
            <th>Subject</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Created By</th>
<th>Updated By</th>
            <th>Action</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($chapters as $chapter)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        <td>{{ $chapter->name }}</td>
	        <td>{{ $chapter->subject->name }}</td>
			<td>@if($chapter->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $chapter->created_at }}</td>
				<td>{{ $chapter->updated_at }}</td>	
				<td>
			@php
			if($chapter->createdby !=null){
				$user = json_decode($chapter->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($chapter->updatedby !=null){
				$user = json_decode($chapter->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	        <td>
                <form action="{{ route('chapters.destroy',$chapter->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('chapters.show',$chapter->id) }}">Show</a>
                  
                    <a class="btn btn-primary" href="{{ route('chapters.edit',$chapter->id) }}">Edit</a>
                   
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
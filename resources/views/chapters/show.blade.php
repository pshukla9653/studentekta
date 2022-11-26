@extends('layouts.app')


@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h2> Show Chapter</h2>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="{{ route('chapters.index') }}"> Back</a>
              
        </div>
</div>
<div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="br-section-label">Show Chapter</h6>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $chapter->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subject:</strong>
                {{ $chapter->subject->name }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
				@if($chapter->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif
               
            </div>
        </div>
    </div>
</div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->	
@endsection

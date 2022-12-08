@extends('layouts.app')
@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h2>Update City</h2>
          
        </div>
		 <div class="pull-right">
            @can('country-list')
                <a class="btn btn-success" href="{{ route('cities.index') }}"> Back</a>
                @endcan
        </div>
</div>

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
          <h6 class="br-section-label">Edit City</h6>
    <form action="{{ route('villages.update', $village->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="country_id">
				  <option value="">Select</option>
                    @foreach($countries as $country)
					<option value="{{$country->id}}" {{$village->country_id==$country->id?'selected':''}}>{{$country->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="state_id" id="state-dd">
				  <option value="">Select</option>
					@foreach($states as $state)
					<option value="{{$state->id}}" {{$village->state_id==$state->id?'selected':''}}>{{$state->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
						<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="state_id" id="state-dd">
				  <option value="">Select</option>
					@foreach($cities as $city)
					<option value="{{$city->id}}" {{$village->city_id==$city->id?'selected':''}}>{{$city->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$village->name}}">
		        </div>
		    </div>
		    
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="status">
                    <option value="1" {{$village->status=='1'?'selected':''}}>Active</option>
                    <option value="0" {{$village->status=='0'?'selected':''}}>Inactive</option>
                   
                  </select>
                </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

 </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->

@endsection
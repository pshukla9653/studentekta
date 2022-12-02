@extends('layouts.app')
@section('content')

<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h2>Add New State</h2>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
		 <div class="pull-right">
            
                <a class="btn btn-success" href="{{ route('cities.index') }}"> Back</a>
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
          <h6 class="br-section-label">Add New City</h6>
    <form action="{{ route('cities.store') }}" method="POST">
    	@csrf


         <div class="row">
			
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" name="state_id" id="state-dd">
				  <option value="">Select</option>
                    @foreach($states as $state)
					<option value="{{$state->id}}">{{$state->name}}</option>
                   @endforeach
                  </select>
                </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    
			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                   
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
<script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            });
       
    </script>
@endsection
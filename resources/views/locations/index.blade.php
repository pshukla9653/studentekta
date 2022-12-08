@extends('layouts.app')

@section('content')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Location Management</h4>
          
        </div>
		 <div class="pull-right">
           
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modaldemo1" data-effect="effect-newspaper"> Create New city</a>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#modaldemo2" data-effect="effect-newspaper"> Import city</a>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#modaldemo3" data-effect="effect-newspaper"> Create New Villege</a>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#modaldemo4" data-effect="effect-newspaper"> Import Villege</a>
        </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
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
          <h6 class="br-section-label">Location List</h6>
		  <div class="pull-right" style="text-align: end;">
           <h4>Total Count: {{$data['count']}}</h4>            
        </div>
		  <div class="form-layout form-layout-1">
		  <form action="{{ route('locations.index') }}" method="PUT">
			@csrf
			
            <div class="row mg-b-25">
             <h4 class="br-section-label">Filter By:</h4>
		  
              <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" id="country-dd" name="country_search">
				  <option value="">Select</option>
                   @foreach($countries as $country)
					<option value="{{$country->country_id}}">{{$country->country_name}}</option>
                   @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
			  
			  <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose state" id="state-dd" name="state_search">
                    
                  </select>
                </div>
              </div><!-- col-4 -->
			  <div class="col-lg-3">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose city" id="city-dd" name="city_search">
                    
                  </select>
				  
                </div>
              </div>
            </div><!-- row -->
			
            <div class="form-layout-footer">
              <input type="submit" class="btn btn-primary" value="Search" name="btn">
              
            </div><!-- form-layout-footer -->
			</form>
          </div><!-- form-layout -->
			<br>
		@if($datadisplay =='state')	
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
			<th>State</th>
            <th>Country</th>
			
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Created By</th>
			<th>Updated By</th>
            
        </tr>
		</thead>
		<tbody>
		@foreach ($data['states'] as $state)
	    <tr>
	        <td>{{$loop->iteration}}</td>
			<td>{{ $state->state_name }}</td>
	        <td>{{ $state->country_name }}</td>
			
			
			<td>@if($state->status=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $state->created_at }}</td>
			<td>{{ $state->updated_at }}</td>	
	        <td>
			@php
			if($state->createdby !=null){
				$user = json_decode($state->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($state->updatedby !=null){
				$user = json_decode($state->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	    </tr>
	    @endforeach
		</tbody>
		</table>
		@endif

		
			
		@if($datadisplay =='city')	
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
			<th>City</th>
			<th>State</th>
            <th>Country</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
            <th>Created By</th>
			<th>Updated By</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($data['cities'] as $city)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        
	       
			<td>{{ $city['name'] }}</td>
			 
			<td>{{ $data['state_name'] }}</td>
			<td>{{ $data['country_name'] }}</td>
			<td>@if($data['status']=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $data['created_at'] }}</td>
			<td>{{ $data['updated_at'] }}</td>	
	        <td>
			@php
			if($city->createdby !=null){
				$user = json_decode($city->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($city->updatedby !=null){
				$user = json_decode($city->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	    </tr>
	    @endforeach
		</tbody>
		</table>
		@endif
          
		@if($datadisplay =='villege')	
          <table id="datatable1" class="table display responsive nowrap">
		<thead>
		<tr>
            <th>No</th>
			<th>Villege</th>
			<th>City</th>
			<th>State</th>
            <th>Country</th>
			<th>Status</th>
			<th>Created At</th>
			<th>Updated At</th>
            <th>Created By</th>
			<th>Updated By</th>
        </tr>
		</thead>
		<tbody>
		@foreach ($data['villeges'] as $villege)
	    <tr>
	        <td>{{$loop->iteration}}</td>
	        
			<td>{{ $villege['name'] }}</td>
			<td>{{ $data['city_name'] }}</td>
			 
			<td>{{ $data['state_name'] }}</td>
			<td>{{ $data['country_name'] }}</td>
			<td>@if($data['status']=='1')
					<span class='text-success'>Active</span>
				@else
					<span class='text-danger'>Inactive</span>
				@endif</td>
			<td>{{ $data['created_at'] }}</td>
			<td>{{ $data['updated_at'] }}</td>	
	        <td>
			@php
			if($villege->createdby !=null){
				$user = json_decode($villege->createdby, true);
				echo $user["name"];
			}
			@endphp
			</td>
			<td>@php
			if($villege->updatedby !=null){
				$user = json_decode($villege->updatedby, true);
				echo $user["name"];
			}
			@endphp</td>
	    </tr>
	    @endforeach
		</tbody>
		</table>
		@endif
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
	  
	  
	  
	  <!-- CITY MODAL -->
          <div id="modaldemo1" class="modal fade effect-newspaper" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add City</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="">
		  <form action="{{ route('add-city') }}" method="POST">
			@csrf
			
            <div class="row">
            
		  
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" id="country-city" name="country_id">
				  <option value="">Select</option>
                   @foreach($countries as $country)
					<option value="{{$country->country_id}}">{{$country->country_name}}</option>
                   @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
			  
			  <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose state" id="state-city" name="state_id">
                    
                  </select>
                </div>
              </div><!-- col-4 -->
			  <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="city_name"/>
                </div>
              </div>
            </div><!-- row -->

           
			
          </div><!-- form-layout -->
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
				</form>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
		  
		  <!-- CITY MODAL -->
          <div id="modaldemo2" class="modal fade effect-newspaper" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Import City</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="">
		  <form action="{{ route('file-import-villege') }}" method="POST" enctype="multipart/form-data">
			@csrf
			
            <div class="row">
            
		  
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" id="country-state-import" name="country_id">
				  <option value="">Select</option>
                   @foreach($countries as $country)
					<option value="{{$country->country_id}}">{{$country->country_name}}</option>
                   @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
			  
			  <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose state" id="state-state-import" name="state_id">
                    
                  </select>
                </div>
              </div><!-- col-4 -->
			  <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <div class="custom-file">
						<input type="file" name="file" id="file" class="custom-file-input">
						<label class="custom-file-label">Choose file</label>
					</div>
		        </div>
				<span class="tx-danger">(Fields Name for Excel: name, status)</span>	
		    </div>
            </div><!-- row -->

           
			
          </div><!-- form-layout -->
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
				</form>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
		  
		  
		  
		  <!-- VILLEGE MODAL -->
          <div id="modaldemo3" class="modal fade effect-newspaper" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Villege</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="">
		  <form action="{{ route('add-villege') }}" method="POST">
			@csrf
			
            <div class="row">
            
		  
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" id="country-villege" name="country_id">
				  <option value="">Select</option>
                   @foreach($countries as $country)
					<option value="{{$country->country_id}}">{{$country->country_name}}</option>
                   @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
			  
			  <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose state" id="state-villege" name="state_id">
                    
                  </select>
                </div>
              </div><!-- col-4 -->
			  <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose city" id="city-villege" name="city_id">
                    
                  </select>
                </div>
              </div>
			  <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Villege: <span class="tx-danger">*</span></label>
                  <input type="text" class="form-control" name="villege_name"/>
                </div>
              </div>
            </div><!-- row -->

            
			
          </div><!-- form-layout -->
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
				</form>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
		  
		  <!-- VILLEGE MODAL -->
          <div id="modaldemo4" class="modal fade effect-newspaper" style="overflow:hidden;">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Import Villege</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="">
		  <form action="{{ route('file-import-school') }}" method="POST" enctype="multipart/form-data">
			@csrf
			
            <div class="row">
            
		  
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" id="country-villege-import" name="country_id">
				  <option value="">Select</option>
                   @foreach($countries as $country)
					<option value="{{$country->country_id}}">{{$country->country_name}}</option>
                   @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->
			  
			  <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose state" id="state-villege-import" name="state_id">
                    
                  </select>
                </div>
              </div><!-- col-4 -->
			  <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                  <select class="form-control select2-show-search" data-placeholder="Choose city" id="city-villege-import" name="city_id">
                    
                  </select>
                </div>
              </div>
			  <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <div class="custom-file">
						<input type="file" name="file" id="file" class="custom-file-input">
						<label class="custom-file-label">Choose file</label>
					</div>
		        </div>
				<span class="tx-danger">(Fields Name for Excel: name, status)</span>	
		    </div>
            </div><!-- row -->

            
			
          </div><!-- form-layout -->
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Save</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Close</button>
                </div>
				</form>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
@endsection

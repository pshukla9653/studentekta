<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Response;
class LocationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
			//$this->middleware('permission:country-list|country-create|country-edit|country-delete', ['only' => ['index','show']]);
			//$this->middleware('permission:country-create', ['only' => ['create','store']]);
			//$this->middleware('permission:country-edit', ['only' => ['edit','update']]);
			//$this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
	   $countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
	  
		$datadisplay ='';
		$data = array();
		$data['count'] =0;
		if($request->input('btn')){
			if($request->input('country_search') && !$request->input('state_search') && !$request->input('city_search')){
				$datadisplay = 'state';
				$data['states'] = Location::where("country_id", $request->input('country_search'))->get(["id", "state_name","country_name","status","created_at","updated_at"]);
				$data['count'] = count($data['states']);
				
			}
			if($request->input('country_search') && $request->input('state_search') && !$request->input('city_search')){
				$datadisplay = 'city';
				$cities = Location::where("id", $request->input('state_search'))->get(["id", "state_name","country_name","cities", "status","created_at","updated_at"]);
				
				$city = json_decode($cities, true);
				$data['cities']  = json_decode($city[0]['cities'], true);
				//$data['cities']  = json_decode($citys, true);
				$data['count'] = count($data['cities']);
				$data['state_name'] = $cities[0]['state_name'];
				$data['country_name'] = $cities[0]['country_name'];
				$data['status'] = $cities[0]['status'];
				$data['created_at'] = $cities[0]['created_at'];
				$data['updated_at'] = $cities[0]['updated_at'];
			}
            //dd($data);
        }
        return view('locations.index',compact('countries','datadisplay','data'));
    }
	
	
	public function fetchState(Request $request)
    {
		
		$data['states'] = Location::where("country_id", $request->country_id)->get(["id", "state_name"]);
		
        return response()->json($data);
    }
	public function fetchCity(Request $request)
    {
		
		$cities = Location::where("id", $request->state_id)->get(["cities"]); 
		$data = json_decode($cities, true);
		$city['cities']  = json_decode($data[0]['cities'], true);
        return response()->json($city);
    }
	
	
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SchoolImport;
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
	   
	  //dd($request->all());
		$datadisplay ='';
		$data = array();
		$data['count'] =0;
		
		if($request->input('btn')){
			request()->validate([
            'country_search' => 'required',
			
        ]);
			if($request->input('country_search') && !$request->input('state_search') && !$request->input('city_search')){
				$datadisplay = 'state';
				$data['states'] = Location::where("country_id", $request->input('country_search'))->get(["id", "state_name","country_name","status","created_at","updated_at","created_by","updated_by"]);
				if($data['states'] != null){
				$data['count'] = count($data['states']);
				}
				else{
					return redirect()->route('locations.index')->with('error','No States Found!');
				}
			}
			if($request->input('country_search') && $request->input('state_search') && !$request->input('city_search')){
				$datadisplay = 'city';
				$cities = Location::where("id", $request->input('state_search'))->get(["id", "state_name","country_name","cities", "status","created_at","updated_at","created_by","updated_by"]);
				
				$city = json_decode($cities, true);
				$data['cities']  = json_decode($city[0]['cities'], true);
				//$data['cities']  = json_decode($citys, true);
				if($data['cities'] != null){
				$data['count'] = count($data['cities']);
				}
				else{
					return redirect()->route('locations.index')->with('error','No Cities Found!');
				}
				$data['state_name'] = $cities[0]['state_name'];
				$data['country_name'] = $cities[0]['country_name'];
				$data['status'] = $cities[0]['status'];
				$data['created_at'] = $cities[0]['created_at'];
				$data['updated_at'] = $cities[0]['updated_at'];
			}
			if($request->input('country_search') && $request->input('state_search') && $request->input('city_search')){
				$datadisplay = 'villege';
				
				$villeges = Location::where("id", $request->input('state_search'))->get(["id", "state_name","country_name","cities", "villeges","status","created_at","updated_at","created_by","updated_by"]);
				
				$villege = json_decode($villeges, true);
				
				$villegelist  = json_decode($villege[0]['villeges'], true);
				if($villegelist !=null){
				$data['villeges'] = $villegelist[$request->city_search];
				$data['count'] = count($data['villeges']);
				}
				else{
					return redirect()->route('locations.index')->with('error','No Villege Found!');
				}
				$city = json_decode($villege[0]['cities'], true);
				foreach($city as $key=>$city_data){
					if($city_data['id'] == $request->city_search){
						$data['city_name'] = $city_data['name'];
					}
				}
				
				
				$data['state_name'] = $villeges[0]['state_name'];
				$data['country_name'] = $villeges[0]['country_name'];
				$data['status'] = $villeges[0]['status'];
				$data['created_at'] = $villeges[0]['created_at'];
				$data['updated_at'] = $villeges[0]['updated_at'];
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
	
	public function addCity(Request $request)
	{	
		$cities = Location::where("id", $request->state_id)->get(["id","cities"]);
		
		if(stripos($cities[0]->cities, $request->city_name) !== false){
			return redirect()->route('locations.index')->with('error','City Already Exist.');
			
		}
		else{
			$cities_array = json_decode($cities[0]->cities, true);
			
			if($cities_array == null){
				$newcity['id'] = 1;
				$newcity['name'] = $request->city_name;
				$cities_array[0] = $newcity;
			}
			else{
				$lastrow = count($cities_array) - 1;
				$lastid = $cities_array[$lastrow]['id'];
				$newid = $lastid + 1;
				$newcity['id'] = "$newid";
				$newcity['name'] = $request->city_name;
				$finalrow = array_push($cities_array, $newcity);
				
			}
			
			$finalcities = json_encode($cities_array);
			
			$update_cities = Location::where("id", $request->state_id)->update(['cities'=>$finalcities]);
			if($update_cities){
				return redirect()->route('locations.index')->with('success','Add New City Successfull.');
			}
			else{
				return redirect()->route('locations.index')->with('error','An error occurred. Try Again');
			}
			
			
		}
	}
	
	public function addVillege(Request $request)
	{	
		$villeges = Location::where("id", $request->state_id)->get(["id","villeges"]);
		
		if(stripos($villeges[0]->villeges, $request->villege_name) !== false){
			return redirect()->route('locations.index')->with('error','Villege Already Exist.');
			
		}
		else{
			$villeges_array = json_decode($villeges[0]->villeges, true);
			
			if($villeges_array == null){
				$newvillege['id'] = "1";
				$newvillege['name'] = $request->villege_name;
				$villeges_array[$request->city_id][0] = $newvillege;
			}
			else{
				
				foreach($villeges_array as $city_id=>$city_data){
					
					if($city_id == $request->city_id){
						
						$lastrow = count($city_data) - 1;
						$lastid = $villeges_array[$request->city_id][$lastrow]['id'];
						$newid = $lastid + 1;
						$newvillege['id'] = "$newid";
						$newvillege['name'] = $request->villege_name;
						
						array_push($villeges_array[$request->city_id], $newvillege);
					}
					else{
						
						$newvillege[0]['id'] = "1";
						$newvillege[0]['name'] = $request->villege_name;
						$villeges_array[$request->city_id] = $newvillege;
					}
				}
					
			}
			
			$finalvillege = json_encode($villeges_array);
			
			$update_villege = Location::where("id", $request->state_id)->update(['villeges'=>$finalvillege]);
			if($update_villege){
				return redirect()->route('locations.index')->with('success','Add New Villege Successfull.');
			}
			else{
				return redirect()->route('locations.index')->with('error','An error occurred. Try Again');
			}
			
			
		}
	}
	
	public function villegesFileImport(Request $request) 
    {	
		request()->validate([
            'country_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'board_id' => 'required',
        ]);
	
        Excel::import(new VillegeImport, $request->file('file')->store('temp'));
        return redirect()->route('import-schools')
                        ->with('success','School imported successfully');
    }
}

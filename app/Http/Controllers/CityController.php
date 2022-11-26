<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CityController extends Controller
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
       $countries 	= Country::all();
	   $states 		= State::all();
	   $totalcities = City::all()->sortBy("name");
	   $citiescount = count($totalcities);
	   $cities =array();
		if($request->input('btn')){
			
            if($request->input('country_search')){
				$find['country_id'] = $request->input('country_search');
			}
			if($request->input('state_search')){
				$find['state_id'] = $request->input('state_search');
			}
            $cities = City::where($find)->get();
			$citiescount = count($cities);
            
        }
        
        return view('cities.index',compact('cities','countries','states','citiescount'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all();
        return view('cities.create', compact('countries'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:cities|alpha_num',
            'country_id' => 'required',
        ]);
    
        City::create($request->all());
    
        return redirect()->route('cities.index')
                        ->with('success','City created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('cities.show',compact('city'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {	$countries = Country::all();
		$states = State::where("country_id", $city->country_id)->get(["name", "id"]);
        return view('cities.edit',compact('city','countries','states'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
         request()->validate([
            'name' => 'required',
            'country_id' => 'required',
        ]);
    
        $city->update($request->all());
    
        return redirect()->route('cities.index')
                        ->with('success','City updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
    
        return redirect()->route('cities.index')
                        ->with('success','Chapter deleted successfully');
    }
	
	public function fetchState(Request $request)
    {
		
		$data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
	public function fetchCity(Request $request)
    {
		
		$data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}

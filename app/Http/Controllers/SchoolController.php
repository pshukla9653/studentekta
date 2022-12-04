<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Board;
use App\Models\School;
class SchoolController extends Controller
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
	   $boards 	= Board::all()->sortBy('name');
	   $totalschools = School::all()->sortBy("name");
	   $schoolscount = count($totalschools);
	   $schools =array();
	   
	   //dd($formolddata);
		if($request->input('btn')){
			
            if($request->input('country_search') && !$request->input('state_search') && !$request->input('city_search')){
				$find['country_id'] = $request->input('country_search');
			}
			if($request->input('country_search') && $request->input('state_search') && !$request->input('city_search')){
				$find['country_id'] = $request->input('country_search');
				$find['state_id'] = $request->input('state_search');
			}
			if($request->input('country_search') && $request->input('state_search') && $request->input('city_search')){
				$find['country_id'] = $request->input('country_search');
				$find['state_id'] 	= $request->input('state_search');
				$find['city_id'] 	= $request->input('city_search');
				
			}
			if($request->input('board_search')){
				$find['board_id'] = $request->input('board_search');
			}
			
            $schools = School::where($find)->get();
			//dd($schools);
			$schoolscount = count($schools);
            
        }
        return view('schools.index', compact('schools','countries','boards','schoolscount'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		$boards = Board::all()->sortBy("name");
        return view('schools.create', compact('countries','boards'));
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
            'name' => 'required|unique:schools',
            'country_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'board_id' => 'required',
        ]);
    
        School::create($request->all());
    
        return redirect()->route('schools.index')->with('success','School created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('schools.show',compact('school'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {	$countries 	= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		$states = 		Location::where("country_id", $school->country_id)->get();
		$citydata = Location::where("id", $school->state_id)->get();
		$cities = json_decode($citydata[0]['cities'], true);
		//dd($cities);
		$boards = Board::all();
        return view('schools.edit',compact('school','countries','states', 'boards','cities'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
         request()->validate([
            'name' => 'required',
            'country_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'board_id' => 'required',
        ]);
    
        $school->update($request->all());
    
        return redirect()->route('schools.index')
                        ->with('success','School updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();
    
        return redirect()->route('schools.index')
                        ->with('success','School deleted successfully');
    }
	
}

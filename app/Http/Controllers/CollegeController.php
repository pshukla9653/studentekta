<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\University;
use App\Models\College;
class CollegeController extends Controller
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
       
		
	   $countries 	= Country::all()->sortBy('name');
	   $universities 	= University::all()->sortBy('name');
	   $totalcolleges = College::all()->sortBy("name");
	   $collegescount = count($totalcolleges);
	   $colleges =array();
	   
		if($request->input('btn')){
			
            if($request->input('country_search')){
				$find['country_id'] = $request->input('country_search');
			}
			if($request->input('state_search')){
				$find['state_id'] = $request->input('state_search');
			}
			if($request->input('university_search')){
				$find['university_id'] = $request->input('university_search');
			}
			
            $colleges = University::where($find)->get();
			$collegescount = count($colleges);
            
        }
        return view('colleges.index',compact('colleges','countries','universities','collegescount'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all()->sortBy("name");
		$universities = University::all()->sortBy("name");
        return view('colleges.create', compact('countries','universities'));
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
            'name' => 'required|unique:colleges|alpha_num',
            'country_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'university_id' => 'required',
        ]);
    
        College::create($request->all());
    
        return redirect()->route('colleges.index')
                        ->with('success','College created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(College $college)
    {
        return view('colleges.show',compact('college'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {	$countries = Country::all();
		$states = State::all();
		$cities = City::all();
		$universities = University::all();
        return view('colleges.edit',compact('college','countries','states', 'cities','universities'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, College $college)
    {
         request()->validate([
            'name' => 'required',
            'country_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'university_id' => 'required',
        ]);
    
        $college->update($request->all());
    
        return redirect()->route('colleges.index')
                        ->with('success','College updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(College $college)
    {
        $college->delete();
    
        return redirect()->route('colleges.index')
                        ->with('success','College deleted successfully');
    }
}

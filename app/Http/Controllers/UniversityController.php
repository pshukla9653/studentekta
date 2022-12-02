<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\University;

class UniversityController extends Controller
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
	   
	   $totaluniversities = University::all()->sortBy("name");
	   $universitiescount = count($totaluniversities);
	   $universities =array();
	   
		if($request->input('btn')){
			
            
			if($request->input('state_search')){
				$find['state_id'] = $request->input('state_search');
			}
			
			
            $universities = University::where($find)->get();
			$universitiescount = count($universities);
            
        }
		
        return view('universities.index', compact('countries','universities','universitiescount'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all()->sortBy("name");
		$courses = Course::all()->sortBy("name");
        return view('universities.create', compact('countries','courses'));
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
            'name' => 'required',
            
			'state_id' => 'required',
			
        ]);
    
        University::create($request->all());
    
        return redirect()->route('universities.index')
                        ->with('success','University created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        return view('universities.show',compact('university'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {	$countries = Country::all();
		$states = State::all();
		$courses = Course::all();
        return view('universities.edit',compact('university','countries','states', 'courses'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
         request()->validate([
            'name' => 'required',
            'country_id' => 'required',
			'state_id' => 'required',
        ]);
    
        $university->update($request->all());
    
        return redirect()->route('universities.index')
                        ->with('success','University updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        $university->delete();
    
        return redirect()->route('universities.index')
                        ->with('success','University deleted successfully');
    }
	
}

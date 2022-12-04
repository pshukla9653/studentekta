<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\University;
use App\Models\College;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CollegeImport;

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
       
		
	   $countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
	   
	   $totalcolleges = College::all()->sortBy("name");
	   $collegescount = count($totalcolleges);
	   $colleges =array();
	   
		if($request->input('btn')){
			
            
			if($request->input('country_search') && !$request->input('state_search') && !$request->input('city_search') && !$request->input('university_search')){
				$find['country_id'] = $request->input('country_search');
			}
			if($request->input('country_search') && $request->input('state_search') && !$request->input('city_search') && !$request->input('university_search')){
				$find['country_id'] = $request->input('country_search');
				$find['state_id'] = $request->input('state_search');
			}
			if($request->input('country_search') && $request->input('state_search') && $request->input('city_search') && !$request->input('university_search')){
				$find['country_id'] = $request->input('country_search');
				$find['state_id'] = $request->input('state_search');
				$find['city_id'] = $request->input('city_search');
			}
			
			if($request->input('country_search') && $request->input('state_search') && $request->input('city_search') && $request->input('university_search')){
				$find['country_id'] = $request->input('country_search');
				$find['state_id'] = $request->input('state_search');
				$find['city_id'] = $request->input('city_search');
				$find['university_id'] = $request->input('university_search');
			}
			
            $colleges = College::where($find)->get();
			$collegescount = count($colleges);
            
        }
        return view('colleges.index',compact('colleges','countries','collegescount'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		
        return view('colleges.create', compact('countries'));
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
            'name' => 'required|unique:colleges,name',
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
    {	$countries 	= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		$states = 		Location::where("country_id", $college->country_id)->get();
		
		$universities = University::where("state_id", $college->state_id)->get();
        return view('colleges.edit',compact('college','countries','states', 'universities'));
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
            'name' => 'required|unique:colleges,name,'.$college->id,
            'country_id' => 'required',
			'state_id' => 'required',
			
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
	
	/**
    * @return \Illuminate\Support\Collection
    */
    public function collegeImport()
    {
		$countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		
       return view('colleges.import', compact('countries'));
    }
   
	/**
    * @return \Illuminate\Support\Collection
    */
    public function collegesFileImport(Request $request) 
    {	
		request()->validate([
            'country_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'university_id' => 'required',
        ]);
	
        Excel::import(new CollegeImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Colleges Imported Successfully.');;
    }
	
	
	
}

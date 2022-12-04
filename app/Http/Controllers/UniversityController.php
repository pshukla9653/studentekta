<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\University;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UniversityImport;

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
       $countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
	   
	   $totaluniversities = University::all()->sortBy("name");
	   $universitiescount = count($totaluniversities);
	   $universities =array();
	   
		if($request->input('btn')){
			
            
			if($request->input('country_search') && !$request->input('state_search')){
				$find['country_id'] = $request->input('country_search');
			}
			
			if($request->input('state_search') && $request->input('state_search')){
				$find['country_id'] = $request->input('country_search');
				$find['state_id'] = $request->input('state_search');
			}
            $universities = University::where($find)->orderBy('name','ASC')->get();
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
		$countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		
        return view('universities.create', compact('countries'));
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
            'name' => 'unique:universities,name|required',
			'state_id' => 'required',
			'country_id' => 'required',
			'status' => 'required'
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
    {	$countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		$states = Location::where("country_id", $university->country_id)->get(["id", "state_name"]);
		
        return view('universities.edit',compact('university','countries','states'));
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
            'name' => 'required|unique:universities,name,'.$university->id,
			'state_id' => 'required',
			'country_id' => 'required',
			'status' => 'required'
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
	
	/**
    * @return \Illuminate\Support\Collection
    */
    public function universityImport()
    {
		$countries 		= Location::select('country_id', 'country_name')->groupBy('country_id')->orderBy('country_name','ASC')->get();
		
       return view('universities.import', compact('countries'));
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function universitiesFileImport(Request $request) 
    {	
		request()->validate([
            'country_id' => 'required',
			'state_id' => 'required',
        ]);
	
        Excel::import(new UniversityImport, $request->file('file')->store('temp'));
        return back()->with('success', 'Universities Imported Successfully.');;
    }
	
	
	public function fetchUniversity(Request $request)
    {
		
		$data['universities'] = University::where("state_id", $request->state_id)->get(["id", "name"]);
		
        return response()->json($data);
    }
}

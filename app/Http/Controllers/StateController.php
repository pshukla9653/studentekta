<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class StateController extends Controller
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
		$countries = Country::all()->sortBy("name");
		
		$tstates = State::all()->sortBy("name");
		$statescount = count($tstates);
		$states = array();
		if($request->input('btn')){
			
            $query = $request->input('country_search');
            $states = State::where('country_id', $query)->get();
			$statescount = count($states);
            
        }
       
        return view('states.index',compact('states','countries','statescount'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all();
        return view('states.create', compact('countries'));
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
            'name' => 'required|unique:states|alpha_num',
            'country_id' => 'required',
        ]);
    
        State::create($request->all());
    
        return redirect()->route('states.index')
                        ->with('success','State created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        return view('states.show',compact('state'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {	$countries = Country::all();
        return view('states.edit',compact('state','countries'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
         request()->validate([
            'name' => 'required',
            'country_id' => 'required',
        ]);
    
        $state->update($request->all());
    
        return redirect()->route('states.index')
                        ->with('success','State updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
    
        return redirect()->route('states.index')
                        ->with('success','Chapter deleted successfully');
    }
}

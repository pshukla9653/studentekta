<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Village;
use App\Models\City;

class VillageController extends Controller
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
		$totalvillages = Village::all()->sortBy("name");
		$villagecount = count($totalvillages);
		$villages = array();
		$find = array();
		if($request->input('btn')){
			
            if($request->input('country_search')){
				$find['country_id'] = $request->input('country_search');
			}
			if($request->input('state_search')){
				$find['state_id'] = $request->input('state_search');
			}
			if($request->input('city_search')){
				$find['city_id'] = $request->input('city_search');
			}
            $villages = Village::where($find)->get();
			$villagecount = count($villages);
            
        }
        
        return view('villages.index', compact('countries','villages','villagecount'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all();
        return view('villages.create', compact('countries'));
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
            'name' => 'required|unique:villages|alpha_num',
            'country_id' => 'required',
			'state_id' => 'required',
        ]);
    
        Village::create($request->all());
    
        return redirect()->route('villages.index')
                        ->with('success','Village created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Village $village)
    {
        return view('villages.show',compact('village'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Village $village)
    {	$countries = Country::all();
		$states = State::all();
		$cities = City::all();
        return view('villages.edit',compact('village','countries','states', 'cities'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
         request()->validate([
            'name' => 'required',
            'country_id' => 'required',
			'state_id' => 'required',
        ]);
    
        $village->update($request->all());
    
        return redirect()->route('villages.index')
                        ->with('success','Village updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        $village->delete();
    
        return redirect()->route('villages.index')
                        ->with('success','Chapter deleted successfully');
    }
}

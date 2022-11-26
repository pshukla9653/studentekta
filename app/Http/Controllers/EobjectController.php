<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Eobject;
use App\Models\City;
class EobjectController extends Controller
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
    public function index()
    {
       
		$eobjects = Eobject::all()->sortBy("name");
		
        return view('eobjects.index',compact('eobjects'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all()->sortBy("name");
        return view('eobjects.create', compact('countries'));
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
            'name' => 'required|unique:eobjects|alpha_num',
            'country_id' => 'required',
			'state_id' => 'required',
        ]);
    
        Eobject::create($request->all());
    
        return redirect()->route('eobjects.index')
                        ->with('success','Eobject created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Eobject $eobject)
    {
        return view('eobjects.show',compact('eobject'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Eobject $eobject)
    {	$countries = Country::all();
		$states = State::all();
		$cities = City::all();
        return view('eobjects.edit',compact('eobject','countries','states', 'cities'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eobject $eobject)
    {
         request()->validate([
            'name' => 'required',
            'country_id' => 'required',
			'state_id' => 'required',
        ]);
    
        $eobject->update($request->all());
    
        return redirect()->route('eobjects.index')
                        ->with('success','Object updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eobject $eobject)
    {
        $eobject->delete();
    
        return redirect()->route('eobjects.index')
                        ->with('success','Object deleted successfully');
    }
}

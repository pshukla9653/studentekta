<?php
    
namespace App\Http\Controllers;
    
use App\Models\Country;
use Illuminate\Http\Request;
    
class CountryController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:country-list|country-create|country-edit|country-delete', ['only' => ['index','show']]);
         $this->middleware('permission:country-create', ['only' => ['create','store']]);
         $this->middleware('permission:country-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all()->sortBy("name");;
        return view('countries.index',compact('countries'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
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
            'name' => 'required|unique:countries|alpha_num',
            'isd_code' => 'required',
        ]);
    
        Country::create($request->all());
    
        return redirect()->route('countries.index')
                        ->with('success','Country created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('countries.show',compact('country'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit',compact('country'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
         request()->validate([
            'name' => 'required',
            'isd_code' => 'required',
        ]);
    
        $country->update($request->all());
    
        return redirect()->route('countries.index')
                        ->with('success','Country updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
    
        return redirect()->route('countries.index')
                        ->with('success','Country deleted successfully');
    }
}
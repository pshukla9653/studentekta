<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subobject;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Board;
use App\Models\Exam;
use App\Models\Course;
use App\Models\Profession;
use App\Models\Stclass;
class SubobjectController extends Controller
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
       
		$subobjects = Subobject::all()->sortBy("name");
		
        return view('subobjects.index',compact('subobjects'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$countries = Country::all()->sortBy("name");
		$boards = Board::all()->sortBy("name");
		$exams = Exam::all()->sortBy("name");
		$courses = Course::all()->sortBy("name");
		$professions = Profession::all()->sortBy("name");
		$stclasses = Stclass::all()->sortBy("name");
		
        return view('subobjects.create', compact('countries','boards','exams','courses','professions','stclasses'));
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
            'country_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'board_id' => 'required',
			'exam_id' => 'required',
			'course_id' => 'required',
			'profession_id' => 'required',
			'stclass_id' => 'required',
			
        ]);
    
        Subobject::create($request->all());
    
        return redirect()->route('subobjects.index')
                        ->with('success','Subobject created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Subobject $subobject)
    {
        return view('subobjects.show',compact('subobject'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Subobject $subobject)
    {	$countries = Country::all()->sortBy("name");
		$states = State::all()->sortBy("name");
		$cities = City::all()->sortBy("name");
		$boards = Board::all()->sortBy("name");
		$exams = Exam::all()->sortBy("name");
		$courses = Course::all()->sortBy("name");
		$professions = Profession::all()->sortBy("name");
		$stclasses = Stclass::all()->sortBy("name");
        return view('subobjects.edit',compact('subobject','countries','states', 'cities','boards','exams','courses','professions','stclasses'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subobject $subobject)
    {
         request()->validate([
            'name' => 'required',
            'country_id' => 'required',
			'state_id' => 'required',
			'city_id' => 'required',
			'board_id' => 'required',
			'exam_id' => 'required',
			'course_id' => 'required',
			'profession_id' => 'required',
			'stclass_id' => 'required',
			
        ]);
    
        $subobject->update($request->all());
    
        return redirect()->route('subobjects.index')
                        ->with('success','Object updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subobject $subobject)
    {
        $subobject->delete();
    
        return redirect()->route('subobjects.index')
                        ->with('success','Object deleted successfully');
    }
}

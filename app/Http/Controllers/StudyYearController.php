<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyYear;

class StudyYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         //$this->middleware('permission:study-list|study-create|study-edit|study-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:study-create', ['only' => ['create','store']]);
         //$this->middleware('permission:study-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:study-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies = StudyYear::all()->sortBy("name");;
        return view('studies.index',compact('studies'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studies.create');
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
            'name' => 'required|unique:study_years,name',
            'status' => 'required',
        ]);
    
        StudyYear::create($request->all());
    
        return redirect()->route('studies.index')
                        ->with('success','Study created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(StudyYear $study)
    {
        return view('studies.show',compact('study'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyYear $study)
    {
        return view('studies.edit',compact('study'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyYear $study)
    {
         request()->validate([
            'name' => 'required|unique:study_years,name,'.$study->id,
            'status' => 'required',
        ]);
    
        $study->update($request->all());
    
        return redirect()->route('studies.index')
                        ->with('success','Study updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyYear $study)
    {
        $study->delete();
    
        return redirect()->route('studies.index')
                        ->with('success','Study deleted successfully');
    }
}

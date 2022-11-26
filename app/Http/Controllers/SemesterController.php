<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         //$this->middleware('permission:semester-list|semester-create|semester-edit|semester-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:semester-create', ['only' => ['create','store']]);
         //$this->middleware('permission:semester-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:semester-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all()->sortBy("name");;
        return view('semesters.index',compact('semesters'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semesters.create');
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
            'name' => 'required|unique:semester|alpha_num',
            'status' => 'required',
        ]);
    
        Semester::create($request->all());
    
        return redirect()->route('semesters.index')
                        ->with('success','Semester created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        return view('semesters.show',compact('semester'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        return view('semesters.edit',compact('semester'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
         request()->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $semester->update($request->all());
    
        return redirect()->route('semesters.index')
                        ->with('success','Semester updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();
    
        return redirect()->route('semesters.index')
                        ->with('success','Semester deleted successfully');
    }
}

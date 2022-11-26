<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         //$this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:course-create', ['only' => ['create','store']]);
         //$this->middleware('permission:course-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all()->sortBy("name");;
        return view('courses.index',compact('courses'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
            'name' => 'required|unique:courses|alpha_num',
            'status' => 'required',
        ]);
    
        Course::create($request->all());
    
        return redirect()->route('courses.index')
                        ->with('success','Course created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show',compact('course'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
         request()->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $course->update($request->all());
    
        return redirect()->route('courses.index')
                        ->with('success','Course updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
    
        return redirect()->route('courses.index')
                        ->with('success','Course deleted successfully');
    }
}

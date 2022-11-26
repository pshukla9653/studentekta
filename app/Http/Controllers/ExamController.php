<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    //
	//
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         //$this->middleware('permission:exam-list|exam-create|exam-edit|exam-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:exam-create', ['only' => ['create','store']]);
         //$this->middleware('permission:exam-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:exam-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all()->sortBy("name");;
        return view('exams.index',compact('exams'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exams.create');
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
            'name' => 'required|unique:exams|alpha_num',
            'status' => 'required',
        ]);
    
        Exam::create($request->all());
    
        return redirect()->route('exams.index')
                        ->with('success','Exam created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return view('exams.show',compact('exam'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('exams.edit',compact('exam'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
         request()->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $exam->update($request->all());
    
        return redirect()->route('exams.index')
                        ->with('success','Exam updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
    
        return redirect()->route('exams.index')
                        ->with('success','Exam deleted successfully');
    }
}

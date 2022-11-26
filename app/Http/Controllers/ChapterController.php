<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Chapter;

class ChapterController extends Controller
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
        $subjects = Subject::all()->sortBy("name");
		$tchapters = Chapter::all()->sortBy("name");
		$chaptercount = count($tchapters);
		$chapters = array();
		if($request->input('btn')){
			
            $query = $request->input('chapter_search');
            $chapters = Chapter::where('subject_id', $query)->get();
			$chaptercount = count($chapters);
            
        }
        return view('chapters.index', compact('chapters','chaptercount','subjects'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$subjects = Subject::all();
        return view('chapters.create', compact('subjects'));
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
            'name' => 'required|unique:chapters|alpha_num',
            'subject_id' => 'required',
        ]);
    
        Chapter::create($request->all());
    
        return redirect()->route('chapters.index')
                        ->with('success','Country created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        return view('chapters.show',compact('chapter'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {	$subjects = Subject::all();
        return view('chapters.edit',compact('chapter','subjects'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter)
    {
         request()->validate([
            'name' => 'required',
            'subject_id' => 'required',
        ]);
    
        $chapter->update($request->all());
    
        return redirect()->route('chapters.index')
                        ->with('success','Chapter updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
    
        return redirect()->route('chapters.index')
                        ->with('success','Chapter deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;
class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         //$this->middleware('permission:profession-list|profession-create|profession-edit|profession-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:profession-create', ['only' => ['create','store']]);
         //$this->middleware('permission:profession-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:profession-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = Profession::all()->sortBy("name");;
        return view('professions.index',compact('professions'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professions.create');
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
            'name' => 'required|unique:professions,name',
            'status' => 'required',
        ]);
    
        Profession::create($request->all());
    
        return redirect()->route('professions.index')
                        ->with('success','Profession created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        return view('professions.show',compact('profession'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        return view('professions.edit',compact('profession'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
         request()->validate([
            'name' => 'required|unique:professions,name,'.$profession->id,
            'status' => 'required',
        ]);
    
        $profession->update($request->all());
    
        return redirect()->route('professions.index')
                        ->with('success','Profession updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        $profession->delete();
    
        return redirect()->route('professions.index')
                        ->with('success','Profession deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotherToungue;

class MotherToungueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         //$this->middleware('permission:toungue-list|toungue-create|toungue-edit|toungue-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:toungue-create', ['only' => ['create','store']]);
         //$this->middleware('permission:toungue-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:toungue-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toungues = MotherToungue::all()->sortBy("name");;
        return view('toungues.index',compact('toungues'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toungues.create');
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
            'name' => 'required|unique:mother_toungues|alpha_num',
            'status' => 'required',
        ]);
    
        MotherToungue::create($request->all());
    
        return redirect()->route('toungues.index')
                        ->with('success','Mother Toungue created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\MotherToungue  $toungue
     * @return \Illuminate\Http\Response
     */
    public function show(MotherToungue $toungue)
    {
        return view('toungues.show',compact('toungue'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Toungue  $toungue
     * @return \Illuminate\Http\Response
     */
    public function edit(MotherToungue $toungue)
    {
        return view('toungues.edit',compact('toungue'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Toungue  $toungue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MotherToungue $toungue)
    {	
         request()->validate([
            'name' => 'required|alpha_num',
            'status' => 'required',
        ]);
    
        $toungue->update($request->all());
    
        return redirect()->route('toungues.index')
                        ->with('success','Mother Toungue updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Toungue  $toungue
     * @return \Illuminate\Http\Response
     */
    public function destroy(MotherToungue $toungue)
    {
        $toungue->delete();
    
        return redirect()->route('toungues.index')
                        ->with('success','Mother Toungue deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caste;

class CasteController extends Controller
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
         //$this->middleware('permission:caste-list|caste-create|caste-edit|caste-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:caste-create', ['only' => ['create','store']]);
         //$this->middleware('permission:caste-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:caste-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $castes = Caste::all()->sortBy("name");;
        return view('castes.index',compact('castes'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('castes.create');
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
            'name' => 'required|unique:castes,name',
            'status' => 'required',
        ]);
    
        Caste::create($request->all());
    
        return redirect()->route('castes.index')
                        ->with('success','Caste created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Caste  $caste
     * @return \Illuminate\Http\Response
     */
    public function show(Caste $caste)
    {
        return view('castes.show',compact('caste'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caste  $caste
     * @return \Illuminate\Http\Response
     */
    public function edit(Caste $caste)
    {
        return view('castes.edit',compact('caste'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caste  $caste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caste $caste)
    {
         request()->validate([
            'name' => 'required|unique:castes,name,'.$caste->id,
            'status' => 'required',
        ]);
    
        $caste->update($request->all());
    
        return redirect()->route('castes.index')
                        ->with('success','Caste updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caste  $caste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caste $caste)
    {
        $caste->delete();
    
        return redirect()->route('castes.index')
                        ->with('success','Caste deleted successfully');
    }
}

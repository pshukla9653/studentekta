<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PassoutYear;


class PassoutYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         //$this->middleware('permission:passout-list|passout-create|passout-edit|passout-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:passout-create', ['only' => ['create','store']]);
         //$this->middleware('permission:passout-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:passout-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passouts = PassoutYear::all()->sortBy("name");;
        return view('passouts.index',compact('passouts'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passouts.create');
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
            'name' => 'required|unique:passout_years,name',
            'status' => 'required',
        ]);
    
        PassoutYear::create($request->all());
    
        return redirect()->route('passouts.index')
                        ->with('success','passout created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\passout  $passout
     * @return \Illuminate\Http\Response
     */
    public function show(PassoutYear $passout)
    {
        return view('passouts.show',compact('passout'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\passout  $passout
     * @return \Illuminate\Http\Response
     */
    public function edit(PassoutYear $passout)
    {
        return view('passouts.edit',compact('passout'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\passout  $passout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PassoutYear $passout)
    {
         request()->validate([
            'name' => 'required||unique:passout_years,name,'.$passout->id,
            'status' => 'required',
        ]);
    
        $passout->update($request->all());
    
        return redirect()->route('passouts.index')
                        ->with('success','passout updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\passout  $passout
     * @return \Illuminate\Http\Response
     */
    public function destroy(PassoutYear $passout)
    {
        $passout->delete();
    
        return redirect()->route('passouts.index')
                        ->with('success','passout deleted successfully');
    }
}

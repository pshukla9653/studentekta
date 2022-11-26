<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stclass;

class StclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         //$this->middleware('permission:stclass-list|stclass-create|stclass-edit|stclass-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:stclass-create', ['only' => ['create','store']]);
         //$this->middleware('permission:stclass-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:stclass-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stclasss = Stclass::all()->sortBy("name");;
        return view('stclasses.index',compact('stclasss'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stclasses.create');
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
            'name' => 'required|unique:stclasses|alpha_num',
            'status' => 'required',
        ]);
    
        Stclass::create($request->all());
    
        return redirect()->route('stclasses.index')
                        ->with('success','Stclass created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Stclass  $stclass
     * @return \Illuminate\Http\Response
     */
    public function show(Stclass $stclass)
    {
        return view('stclasses.show',compact('stclass'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stclass  $stclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Stclass $stclass)
    {
        return view('stclasses.edit',compact('stclass'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stclass  $stclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stclass $stclass)
    {
         request()->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $stclass->update($request->all());
    
        return redirect()->route('stclasses.index')
                        ->with('success','Stclass updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stclass  $stclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stclass $stclass)
    {
        $stclass->delete();
    
        return redirect()->route('stclasses.index')
                        ->with('success','Stclass deleted successfully');
    }
}

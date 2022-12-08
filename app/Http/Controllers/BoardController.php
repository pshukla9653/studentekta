<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
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
         //$this->middleware('permission:board-list|board-create|board-edit|board-delete', ['only' => ['index','show']]);
         //$this->middleware('permission:board-create', ['only' => ['create','store']]);
         //$this->middleware('permission:board-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:board-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::all()->sortBy("name");;
        return view('boards.index',compact('boards'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boards.create');
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
            'name' => 'required|unique:boards,name',
            'status' => 'required',
        ]);
    
        Board::create($request->all());
    
        return redirect()->route('boards.index')
                        ->with('success','Board created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        return view('boards.show',compact('board'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        return view('boards.edit',compact('board'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
         request()->validate([
            'name' => 'required|unique:boards,name,'.$board->id,
            'status' => 'required',
        ]);
    
        $board->update($request->all());
    
        return redirect()->route('boards.index')
                        ->with('success','Board updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        $board->delete();
    
        return redirect()->route('boards.index')
                        ->with('success','Board deleted successfully');
    }
}

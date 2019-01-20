<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groups;


class GroupController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$mygroups = Groups::all();
        //return $mygroups;
        $mygroups = Groups::orderBy('id', 'asc')->paginate(14);
    
        return view('group.index')->with('groups', $mygroups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            //unique:tables
            'name' => 'required|unique:groups'
        ]);

        $post = new Groups;
        $post->name = $request->input('name');
        $post->save();
        return redirect('/group')->with('success','Groups Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $group = Groups::find($id);
        return view('group.edit')->with('group', $group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            //unique:tables
            'name' => 'required|unique:groups'
        ]);

        $post = Groups::find($id);
        $post->name = $request->input('name');
        $post->save();
        return redirect('/group')->with('success','Groups Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $group = Groups::find($id);
        $group->delete();
        return redirect('/group')->with('success','Groups Deleted');
        
    }
}

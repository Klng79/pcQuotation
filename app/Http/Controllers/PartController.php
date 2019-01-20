<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parts;
use App\Groups;
use DB;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$mypart = Parts::all();
        $mypart = DB::table('parts')
            ->join('groups', 'parts.group_id', '=', 'groups.id')
            ->select('parts.*','groups.name as group_name')
            ->paginate(5);
        // dd($mypart);
     
        return view('part.index')->with('mypart', $mypart);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $grouplist = Groups::All();
        return view('part.create')->with('grouplist', $grouplist);
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
            'name' => 'required',
            'group' => 'required',
            'price' => 'required|numeric'
        ]);
        $post = new Parts;
        $post->name = $request->input('name');
        $post->group_id  = $request->input('group');
        $post->price = $request->input('price');
        $post->save();
        return redirect('/part')->with('success','Part Created');
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
        return ('This is show pages');  
    
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
        $part = Parts::find($id);
        //return $part->id;
        $grouplist = Groups::All();
        return view('part.edit')->with('part', $part)->with('grouplist', $grouplist);
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
        //
        $this->validate($request, [
            //unique:tables
            'name' => 'required',
            'group' => 'required',
            'price' => 'required|numeric'
        ]);

        $post = Parts::find($id);
        $post->name = $request->input('name');
        $post->group_id  = $request->input('group');
        $post->price = $request->input('price');
        $post->save();
        return redirect('/part')->with('success','Part Updated');
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
        $part = Parts::find($id);
        $part->delete();
        return redirect('/part')->with('success','Part Deleted');
    }

    public function search(Request $request){
        $mypart = DB::table('parts')
            ->join('groups', 'groups.id', '=', 'parts.group_id')
            ->select('parts.*', 'groups.name as group_name')
            ->where('parts.name', 'like', '%'.$request->search.'%')
            ->orWhere('groups.name', 'like', '%'.$request->search.'%')
            ->get();

         //dd($part);
        return view('part.index')->with('mypart', $mypart);
        //$part = Parts::where('name', 'like', '%'.$request->search.'%')->get();
        //$part = Parts::where('name', 'like', '%'.$request->search.'%');
        // $part = Parts::find(1);
        // $part_group = $part->group();
        //  return $part;
        //$bygroup = Groups::find();
        //$part = Parts::find(1);
        //return $part->group;
        //dd($bygroup->parts);
        //return $part->partGroup();
        // $parts = DB::table('parts')
        //     ->join('groups', 'groups.id', '=', 'parts.group_id')
        //     ->select('parts.*', 'groups.name as groupname')
        //     ->get();

        // dd($parts);

    }
}

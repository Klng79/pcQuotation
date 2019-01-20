<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->role->name ;
        // $myauth = $user->role;
        //return $user;
        //dd($user->role)->name;
        //$groupname = $user->role->name;
        return view('home')->with('user', $user);
        
    //    
    //    return $myauth->getRoles();
    }
}

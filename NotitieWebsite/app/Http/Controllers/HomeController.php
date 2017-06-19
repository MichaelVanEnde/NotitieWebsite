<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notitie;
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
     * @return \Illuminate\Http\Response
     */

    public function index()
    {        
        $notities = Notitie::all();
        $notities->load('user');
        //return $notities;
        return view('home',compact('notities'));
        //return view('home');
    }
}

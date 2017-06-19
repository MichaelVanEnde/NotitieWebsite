<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notitie;
use App\User;
use DB;

class NotitieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, User $user)
    {
        $this->validate($request,[
            'body' => 'required|min:10'
        ]);

        $notitie = $user->notities()->create($request->all());

    	return back();
    }

    public function edit(Notitie $notitie)
    {
        $notitie->load('user');

        return view('notities.edit', compact('notitie'));
    }

    public function update(Request $request,Notitie $notitie)
    {
        $notitie->update($request->all());
        
        return back();
    }

    public function delete(Notitie $notitie)
    {  


        if((Auth::user()->id) === ($notitie->user_id) )
        {
            $notitie->delete();
            return redirect('/home');
        }
        else
        {
            return "U kan deze notitie niet verwijderen!!!!";
        }
    }

    public function show(User $user)
    {
        $user->load('notities.user');

        return view('users.show',compact('user'));
    }


}

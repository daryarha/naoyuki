<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$notification = auth()->user()->notifications()->get();
    	return view('dashboard.dashboard', ['notifications'=>$notification]);
    }

    public function profil()
    {
        $profil = User::where('id', auth()->user()->id)->firstOrFail();
    	return view('dashboard.profil', ['profil'=>$profil]);
    }


    public function editprofil(Request $request)
    {
    	$validator =  Validator::make($request->all(),
            [
            'name'=> 'required',
            'email'=> 'required',
            'role'=> 'required'
        ]);

        if ($validator->fails()){
            return redirect ('potentialmarket')->withErrors($validator)->withInput();
        }
        $list = User::find(auth()->user()->id);
        if(!empty($request->password)){        	
	        $list->name = $request->name;
	        $list->email = $request->email;
	        $list->role = $request->role;
	        $list->password = Hash::make($request->password);
        }else{        	
	        $list->name = $request->name;
	        $list->email = $request->email;
	        $list->role = $request->role;
        }
        $list->save();

        return redirect ('profil');
    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications()->get()->toArray();
    }
}

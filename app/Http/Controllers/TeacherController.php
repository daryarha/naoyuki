<?php

namespace App\Http\Controllers;

use App\HRModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Notifications\HRCreated;
use App\Notifications\HRUpdated;
use App\Notifications\HRDestroyed;
use Illuminate\Support\Facades\Notification;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = HRModel::where('position', 'teacher')->get();
        return view('humanresource.teacher', ['teachers'=>$teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),
            [
            'name' =>'required',
            'address' =>'required',
            'hp' =>'required',
            'cv'=> 'required|mimes:pdf',

        ]);

        if ($validator->fails()){
            return redirect ('teacher')->withErrors($validator)->withInput();
        }

        $teacher = new HRModel;
        if($request->file('cv')->isValid()){
            $cv = explode("/", $request->file('cv')->storeAs('public/teacher', $request->file('cv')->getClientOriginalName()));
            $teacher->name = $request->name;
            $teacher->address = $request->address;
            $teacher->phone = $request->hp;
            $teacher->position ="teacher";
            $teacher->id_user = auth()->user()->id;
            $teacher->cv = $cv[2];
            $teacher->save();
            $users = User::all();
            Notification::send($users, new HRCreated($teacher));
            return redirect ('teacher');
        }
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
         $validator =  Validator::make($request->all(),
            [
            'name_edit' =>'required',
            'address_edit' =>'required',
            'hp_edit' =>'required',
            'cv_edit'=> 'mimes:pdf',

        ]);

        if ($validator->fails()){
            return redirect ('teacher')->withErrors($validator)->withInput();
        }

        $teacher = HRModel::find($id);
        if(empty($request->file('cv_edit'))){
            $teacher->name = $request->name_edit;
            $teacher->address = $request->address_edit;
            $teacher->phone = $request->hp_edit;
            $teacher->id_user = auth()->user()->id;
            $teacher->save();
            $users = User::all();
            Notification::send($users, new HRUpdated($teacher));
            return redirect ('teacher');            
        }else if($request->file('cv_edit')->isValid()){
            $cv = explode("/", $request->file('cv_edit')->storeAs('public/teacher', $request->file('cv_edit')->getClientOriginalName()));
            $teacher->name = $request->name_edit;
            $teacher->address = $request->address_edit;
            $teacher->phone = $request->hp_edit;
            $teacher->cv = $cv[2];
            $teacher->id_user = auth()->user()->id;
            $teacher->save();
            $users = User::all();
            Notification::send($users, new HRUpdated($teacher));
            return redirect ('teacher');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = HRModel::where('id', $id);
        $teacher->delete();
        $users = User::all();
        Notification::send($users, new Destroyed($teacher));
        if($teacher){
            return redirect('teacher');
        }
    }
}

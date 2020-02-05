<?php

namespace App\Http\Controllers;

use App\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Notifications\ClassCreated;
use App\Notifications\ClassUpdated;
use App\Notifications\ClassDestroyed;
use Illuminate\Support\Facades\Notification;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $class = ClassModel::all();
        return view('academic.class', ['classes'=>$class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = ClassModel::all();
        return view('academic.class_setting', ['classes'=>$class]);
    
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
            'class_name'=> 'required',
        ]);

        if ($validator->fails()){
            return redirect ('class/create')->withErrors($validator)->withInput();
        }

        $list = new ClassModel;
        $list->name = $request->class_name;
        $list->id_user = auth()->user()->id;
        $list->save();
        $users = User::all();
        Notification::send($users, new ClassCreated($list));
        return redirect ('class/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
            'class_edit'=> 'required',
        ]);

        if ($validator->fails()){
            return redirect ('class/create')->withErrors($validator)->withInput();
        }

        $list = ClassModel::find($id);
        $list->name = $request->class_edit;
        $list->id_user = auth()->user()->id;
        $list->save();
        $users = User::all();
        Notification::send($users, new ClassUpdated($list));
        return redirect ('class/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = ClassModel::where('id', $id)->delete();
        if($list){
            $users = User::all();
            Notification::send($users, new ClassDestroyed($list));
            return redirect('class/create');
        }

    }
}

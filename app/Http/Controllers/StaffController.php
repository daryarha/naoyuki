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

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = HRModel::all();
        $staffs = $all->diff(HRModel::where('position', 'Teacher')->get());
        return view('humanresource.staff', ['staffs'=>$staffs]);
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
        $messages = [
            'max' => 'The :attribute field is exceed maximum size.',
        ];
         $validator =  Validator::make($request->all(),
            [
            'name' =>'required',
            'address' =>'required',
            'hp' =>'required',
            'position' =>'required',
            'cv'=> 'required|mimes:pdf|max:500000',
        ], $messages);

        if ($validator->fails()){
            return redirect ('staff')->withErrors($validator)->withInput();
        }

        $staff = new HRModel;
        if($request->file('cv')->isValid()){
            $cv = explode("/", $request->file('cv')->storeAs('public/staff', $request->file('cv')->getClientOriginalName()));
            $staff->name = $request->name;
            $staff->address = $request->address;
            $staff->phone = $request->hp;
            $staff->position = $request->position;
            $staff->id_user = auth()->user()->id;
            $staff->cv = $cv[2];
            $staff->save();
            $users = User::all();
            Notification::send($users, new HRCreated($staff));
            return redirect ('staff');
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
            'position_edit' =>'required',
            'cv_edit'=> 'mimes:pdf|max:5128',

        ]);

        if ($validator->fails()){
            return redirect ('staff')->withErrors($validator)->withInput();
        }

        $staff = HRModel::find($id);
        if(empty($request->file('cv_edit'))){
            $staff->name = $request->name_edit;
            $staff->address = $request->address_edit;
            $staff->phone = $request->hp_edit;
            $staff->position = $request->position_edit;
            $staff->id_user = auth()->user()->id;
            $staff->save();
            $users = User::all();
            Notification::send($users, new HRUpdated($staff));
            return redirect ('staff');            
        }else if($request->file('cv_edit')->isValid()){
            $cv = explode("/", $request->file('cv_edit')->storeAs('public/staff', $request->file('cv_edit')->getClientOriginalName()));
            $staff->name = $request->name_edit;
            $staff->address = $request->address_edit;
            $staff->phone = $request->hp_edit;
            $staff->position = $request->position_edit;
            $staff->cv = $cv[2];
            $staff->id_user = auth()->user()->id;
            $staff->save();
            $users = User::all();
            Notification::send($users, new HRUpdated($staff));
            return redirect ('staff');
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
        $staff = HRModel::where('id', $id);
        $staff->delete();
        $users = User::all();
        Notification::send($users, new HRUpdated($staff));
        if($staff){
            return redirect('staff');
        }
    }
}

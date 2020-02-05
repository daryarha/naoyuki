<?php

namespace App\Http\Controllers;

use App\PotentialMModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Notifications\PotentialCreated;
use App\Notifications\PotentialUpdated;
use App\Notifications\PotentialDestroyed;
use Illuminate\Support\Facades\Notification;

class PotentialMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if(auth()->user()->role==2 || auth()->user()->role==1){
            $potential = PotentialMModel::all();
            $contacted = PotentialMModel::where('contacted', 1)->count();
            $not_contacted = PotentialMModel::where('contacted', 0)->count();
            $result_minus = PotentialMModel::where('result', 0)->count();
            $result_plus = PotentialMModel::where('result', 1)->count();
            $goal = PotentialMModel::where('result', 1)->where('contacted', 1)->count();
            return view('marketingstrategy.potentialmarket', ['potentials'=>$potential,'contacted'=>$contacted,'not_contacted'=>$not_contacted,'result_minus'=>$result_minus,'result_plus'=>$result_plus,'goal'=>$goal]);    
        }else{
            return redirect ('dashboard');
        }
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
        if(auth()->user()->role==2){
            $validator =  Validator::make($request->all(),
                [
                'nama'=> 'required',
                'hp' => 'required',
                'email' => 'required',
                'address' => 'required',
                'contacted' => 'required',
                'result' => 'required'
            ]);

            if ($validator->fails()){
                return redirect ('potentialmarket')->withErrors($validator)->withInput();
            }

            $list = new PotentialMModel;
            $list->name = $request->nama;
            $list->phone = $request->hp;
            $list->email = $request->email;
            $list->address = $request->address;
            $list->contacted = $request->contacted;
            $list->result = $request->result;
            $list->id_user = auth()->user()->id;
            $list->save();
            $users = User::where('role', 1)->get();
            Notification::send($users, new PotentialCreated($list));
            return redirect ('potentialmarket');       
        }else{
            return redirect ('dashboard');
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
        if(auth()->user()->role==2 || auth()->user()->role==1){
            if($request->note_edit){
                $validator =  Validator::make($request->all(),
                [
                'note_edit'=> 'required',
                'status_edit'=> 'required'
                ]);

                if ($validator->fails()){
                    return redirect ('potentialmarket')->withErrors($validator)->withInput();
                }

                $list = PotentialMModel::find($id);
                $list->note = $request->note_edit;
                $list->id_status = $request->status_edit;
                $list->id_user = auth()->user()->id;

                $list->save();
                $users = User::where('role', 1)->get();
                Notification::send($users, new PotentialStatusChanged($list));
            }else{
                $validator =  Validator::make($request->all(),
                [
                'nama_edit'=> 'required',
                'hp_edit'=> 'required',
                'email_edit'=> 'required',
                'address_edit'=> 'required',  
                'contacted_edit'=> 'required',
                'result_edit'=> 'required'
                ]);

                if ($validator->fails()){
                    return redirect ('potentialmarket')->withErrors($validator)->withInput();
                }

                $list = PotentialMModel::find($id);
                $list->name = $request->nama_edit;
                $list->phone = $request->hp_edit;
                $list->email = $request->email_edit;
                $list->address = $request->address_edit;
                if($list->contacted!=$request->contacted_edit){
                        $list->contacted = $request->contacted_edit;
                        $users = User::where('role', 1)->get();
                        Notification::send($users, new PotentialContactChanged($list));
                }
                if($list->result!=$request->result_edit){
                        $list->result = $request->result_edit;
                        $users = User::where('role', 1)->get();
                        Notification::send($users, new PotentialResultChanged($list));
                }
                $list->id_user = auth()->user()->id;

                $list->save();
                $users = User::where('role', 1)->get();
                Notification::send($users, new PotentialUpdated($list));
            }
            
            return redirect ('potentialmarket');    
        }else{
            return redirect ('dashboard');
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
        if(auth()->user()->role==2){
            $list = PotentialMModel::where('id', $id);
            $list->delete();
            $users = User::where('role', 1)->get();
            Notification::send($users, new PotentialDestroyed($list));
            if($list){
                return redirect('potentialmarket');
            }    
        }else{
            return redirect ('dashboard');
        }
    }
}

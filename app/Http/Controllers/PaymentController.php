<?php

namespace App\Http\Controllers;

use App\ProgramModel;
use App\PaymentModel;
use App\StudentModel;
use App\StudentProgramModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\User;
use App\Notifications\PaymentCreated;
use App\Notifications\PaymentUpdated;
use App\Notifications\PaymentDestroyed;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = StudentModel::has('payments')->get();
        $program = ProgramModel::all();
        return view('finance.payment', ['students'=>$student, 'programs'=>$program]);
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
            'studentnama'=> 'required',
            'programlist' => 'required',
            'totalpayment' => 'required',
            'datepayment' => 'required'
        ]);

        if ($validator->fails()){
            return redirect ('payment')->withErrors($validator)->withInput();
        }

        foreach ($request->totalpayment as $key => $value) {
            if ($value != "") {
                $list = new PaymentModel;
                $list->id_student = $request->studentnama;
                $list->sum_cost = $value;
                $list->date = $request->datepayment[$key];
                $list->eta = $request->etapayment[$key];
                $list->id_user = auth()->user()->id;
                $list->save();
                $users = User::all();
                Notification::send($users, new PaymentCreated($list));
            }
           
        }
        foreach ($request->programlist as $key => $value) {
            if ($value != "") {
                $list = new StudentProgramModel;
                $list->id_student = $request->studentnama;
                $list->id_program = $value;
                $list->id_user = auth()->user()->id;
                $list->save();
            }
        }
        
        return redirect ('payment');
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
        $student = StudentProgramModel::where('id_student', $id)->delete();
        $list = PaymentModel::where('id_student', $id)->delete();
        
         $validator =  Validator::make($request->all(),
            [
            'student_edit'=> 'required',
            'programlist_edit' => 'required',
            'totalpayment_edit' => 'required',
            'datepayment_edit' => 'required'
        ]);

        if ($validator->fails()){
            return redirect ('payment')->withErrors($validator)->withInput();
        }

        foreach ($request->totalpayment_edit as $key => $value) {
            if ($value != "") {
                $list = new PaymentModel;
                $list->id_student = $request->student_edit;
                $list->sum_cost = $value;
                $list->date = $request->datepayment_edit[$key];
                $list->eta = $request->etapayment_edit[$key];
                $list->id_user = auth()->user()->id;
                $list->save();
                $users = User::all();
                Notification::send($users, new PaymentUpdated($list));
            }
           
        }
        foreach ($request->programlist_edit as $key => $value) {
            if ($value != "") {
                $list = new StudentProgramModel;
                $list->id_student = $request->student_edit;
                $list->id_program = $value;
                $list->id_user = auth()->user()->id;
                $list->save();
            }
        }
        
        return redirect ('payment');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = StudentProgramModel::where('id_student', $id)->delete();
        $list = PaymentModel::where('id_student', $id);
        $list->delete();
        $users = User::all();
        Notification::send($users, new PaymentDestroyed($list));
        if($list){
            return redirect('payment');
        }
    }
}

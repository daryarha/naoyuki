<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PayrollModel;
use App\PaymentModel;
use App\PayrollExtraModel;
use App\HRModel;
use App\PayrollStandarModel;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Notifications\PayrollCreated;
use App\Notifications\PayrollUpdated;
use App\Notifications\PayrollDestroyed;
use Illuminate\Support\Facades\Notification;
class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::enableQueryLog();

        $payrollTeachers = PayrollModel::doesntHave('extra')->get();
        // $payrollTeachers = PayrollModel::whereHas('hr', function(Builder $query) use($hr_name){
        //     $query->where('name','like', $hr_name);
        // })->get();
        $payrollStaffs = PayrollModel::has('extra')->get();
        $payroll = PayrollModel::where('status','1');
        $payment = PaymentModel::all();
        // dd(DB::getQueryLog());
        // var_dump($payrollTeachers[1]->id);
        $all = HRModel::all();
        $staffs = $all->diff(HRModel::where('position', 'Teacher')->get());
        $teachers = HRModel::where('position', 'teacher')->get();
        return view('finance.payroll', ['payroll'=>$payroll,'payment'=>$payment,'payrollTeachers'=>$payrollTeachers, 'payrollStaffs'=>$payrollStaffs, 'staffs'=>$staffs, 'teachers'=>$teachers]);
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
        
        $payrollstandar = PayrollStandarModel::all();
        if ($request->position==1) {
            $validator =  Validator::make($request->all(),
                [
                'staff_date'=> 'required',
                'staff_nama' => 'required',
                'staff_total_work' => 'required',
                'staff_score' => 'required',
                'staff_status'=> 'required',
                'staff_note' => 'required',
            ]);

            if ($validator->fails()){
                return redirect ('payroll')->withErrors($validator)->withInput();
            }

            $list = new PayrollModel;
            $list->date = $request->staff_date;
            $list->id_hr = $request->staff_nama;
            $list->score = $request->staff_score;
            $list->id_user = auth()->user()->id;
            $list->payroll=0;
            foreach ($payrollstandar as $key => $value) {
                if ($value->id==1) {
                    $list->payroll+=$value->nominal;
                }
                else if($value->id==2||$value->id==3){
                    $list->payroll+=$value->nominal*$request->staff_total_work;
            
                }
                else if($value->id==4 && $request->staff_score>200){
                    $list->payroll+=$value->nominal;
                }
                
            }
            $list->payroll += $request->staff_score*3000;
            $list->status = $request->staff_status;
            $list->note = $request->staff_note;
            $list->save();
            $users = User::all();
            Notification::send($users, new PayrollCreated($list));
            $id = $list->id;            
            $list = new PayrollExtraModel;
            $list->id = $id;
            $list->total_work = $request->staff_total_work;
            $list->save();
        }
        else if($request->position==2){
            $validator =  Validator::make($request->all(),
                [
                'teacher_date'=> 'required',
                'teacher_nama' => 'required',
                'teacher_score' => 'required',
                'teacher_status'=> 'required',
                'teacher_note' => 'required',
            ]);

            if ($validator->fails()){
                return redirect ('payroll')->withErrors($validator)->withInput();
            }

            $list = new PayrollModel;
            $list->date = $request->teacher_date;
            $list->id_hr = $request->teacher_nama;
            $list->score = $request->teacher_score;
            $list->id_user = auth()->user()->id;
            $list->payroll=0;
            foreach ($payrollstandar as $key => $value) {
                if ($value->id==1) {
                    $list->payroll+=$value->nominal;
                }
                else if($value->id==4 && $request->teacher_score>200){
                    $list->payroll+=$value->nominal;
                }
                
            }
            $list->payroll += $request->teacher_score*3000;
            $list->status = $request->teacher_status;
            $list->note = $request->teacher_note;
            $list->save();
            $users = User::all();
            Notification::send($users, new PayrollCreated($list));
       }
     return redirect ('payroll');
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
        
        $payrollstandar = PayrollStandarModel::all();
        // echo $request->position_edit;
        if ($request->position_edit=='staff') {
            $validator =  Validator::make($request->all(),
                [
                'staff_date_edit'=> 'required',
                'staff_nama_edit' => 'required',
                'staff_total_work_edit' => 'required',
                'staff_score_edit' => 'required',
                'staff_status_edit'=> 'required',
                'staff_note_edit' => 'required',
            ]);

            if ($validator->fails()){
                return redirect ('payroll')->withErrors($validator)->withInput();
            }

            $list = PayrollModel::find($id);
            $list->date = $request->staff_date_edit;
            $list->id_hr = $request->staff_nama_edit;
            $list->score = $request->staff_score_edit;
            $list->payroll=0;
            foreach ($payrollstandar as $key => $value) {
                if ($value->id==1) {
                    $list->payroll+=$value->nominal;
                }
                else if($value->id==2||$value->id==3){
                    $list->payroll+=$value->nominal*$request->staff_total_work_edit;
            
                }
                else if($value->id==4 && $request->staff_score_edit>200){
                    $list->payroll+=$value->nominal;
                }
                
            }
            $list->payroll += $request->staff_score_edit*3000;
            $list->status = $request->staff_status_edit;
            $list->note = $request->staff_note_edit;
            $list->id_user = auth()->user()->id;
            $list->save();
            $users = User::all();
            Notification::send($users, new PayrollUpdated($list));
            $id = $list->id;            
            $list = PayrollExtraModel::find($id);
            $list->id = $id;
            $list->total_work = $request->staff_total_work_edit;
            $list->save();
        }
        else if($request->position_edit=='teacher'){
            $validator =  Validator::make($request->all(),
                [
                'teacher_date_edit'=> 'required',
                'teacher_nama_edit' => 'required',
                'teacher_score_edit' => 'required',
                'teacher_status_edit'=> 'required',
                'teacher_note_edit' => 'required',
            ]);

            if ($validator->fails()){
                return redirect ('payroll')->withErrors($validator)->withInput();
            }

            $list = PayrollModel::find($id);
            $list->date = $request->teacher_date_edit;
            $list->id_hr = $request->teacher_nama_edit;
            $list->score = $request->teacher_score_edit;
            $list->payroll=0;
            foreach ($payrollstandar as $key => $value) {
                if ($value->id==1) {
                    $list->payroll+=$value->nominal;
                }
                else if($value->id==4 && $request->teacher_score_edit>200){
                    $list->payroll+=$value->nominal;
                }
                
            }
            $list->payroll += $request->teacher_score_edit*3000;
            $list->status = $request->teacher_status_edit;
            $list->note = $request->teacher_note_edit;
            $list->id_user = auth()->user()->id;
            $list->save();
            $users = User::all();
            Notification::send($users, new PayrollUpdated($list));
       }
     return redirect ('payroll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = PayrollExtraModel::where('id',  $id)->delete();
        $list = PayrollModel::where('id',  $id);
        $list->delete();
        $users = User::all();
        Notification::send($users, new PayrollUpdated($list));
        if($list){
            return redirect('payroll');
        }
    }
}

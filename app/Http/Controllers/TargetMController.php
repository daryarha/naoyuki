<?php

namespace App\Http\Controllers;

use App\TargetMModel;
use App\FunnelingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Notifications\TargetCreated;
use App\Notifications\TargetUpdated;
use App\Notifications\TargetDestroyed;
use Illuminate\Support\Facades\Notification;

class TargetMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role==2 || auth()->user()->role==1){
            $target = TargetMModel::all();
            $funneling = FunnelingModel::all()->sortByDesc('created_at');
            $education = TargetMModel::selectRaw('education, count(id) as max_education')
            					->groupBy('education')
            					->orderBy('max_education', 'desc')
            					->first();
            $institution = TargetMModel::selectRaw('institution, count(id) as max_institution')
            					->groupBy('institution')
            					->orderBy('max_institution', 'desc')
            					->first();
            $job = TargetMModel::selectRaw('job, count(id) as max_job')
                                ->groupBy('job')
                                ->orderBy('max_job', 'desc')
                                ->first();
            $gender_male = TargetMModel::where('gender',1)->count();
            $gender_female = TargetMModel::where('gender',0)->count();
            $age = TargetMModel::selectRaw('timestampdiff(year, birth_date, now()) as age')
            					->get();
            return view('marketingstrategy.targetmarket',['targets'=>$target,'age'=>$age,'education'=>$education,'job'=>$job,'institution'=>$institution,'funnelings'=>$funneling,'gender_male'=>$gender_male,'gender_female'=>$gender_female]);  
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(auth()->user()->role==2){
            $validator =  Validator::make($request->all(),
            [
                'nama'=> 'required',
                'nickname'=> 'required',
                'birth_date'=> 'required',
                'gender'=> 'required',
                'origin_city'=> 'required',
                'domicile'=> 'required',
                'job'=> 'required',
                'education'=> 'required',
                'institution'=> 'required',
                'religion'=> 'required',
                'phone'=> 'required',
                'email'=> 'required',
                'id_line'=> 'required',
                'id_instagram'=> 'required'

            ]);

            if ($validator->fails()){
                return redirect ('targetmarket')->withErrors($validator)->withInput();
            }

            $list = new TargetMModel;
            $list->name = $request->nama;
            $list->nickname = $request->nickname;
            $list->birth_date = $request->birth_date;
            $list->origin_city = $request->origin_city;
            $list->domicile = $request->domicile;
            $list->job = $request->job;
            $list->gender = $request->gender;
            $list->education = $request->education;
            $list->institution = $request->institution;
            $list->religion = $request->religion;
            $list->phone = $request->phone;
            $list->email = $request->email;
            $list->id_line = $request->id_line;
            $list->id_user = auth()->user()->id;
            $list->id_instagram = $request->id_instagram;


            $list->save();
            $users = User::where('role', 1)->get();
            Notification::send($users, new TargetCreated($list));
            return redirect ('targetmarket');
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
        if(auth()->user()->role==2){
             $validator =  Validator::make($request->all(),
                [

                'nama_edit'=> 'required',
                'nickname_edit'=> 'required',
                'birth_date_edit'=> 'required',
                'origin_city_edit'=> 'required',
                'domicile_edit'=> 'required',
                'job_edit'=> 'required',
                'education_edit'=> 'required',
                'institution_edit'=> 'required',
                'religion_edit'=> 'required',
                'phone_edit'=> 'required',
                'email_edit'=> 'required',
                'id_line_edit'=> 'required',
                'id_instagram_edit'=> 'required',
                'gender_edit'=> 'required'

            ]);

            if ($validator->fails()){
                return redirect ('targetmarket')->withErrors($validator)->withInput();
            }

            $list = TargetMModel::find($id);
            $list->name = $request->nama_edit;
            $list->nickname = $request->nickname_edit;
            $list->birth_date = $request->birth_date_edit;
            $list->origin_city = $request->origin_city_edit;
            $list->domicile = $request->domicile_edit;
            $list->job = $request->job_edit;
            $list->education = $request->education_edit;
            $list->institution = $request->institution_edit;
            $list->religion = $request->religion_edit;
            $list->phone = $request->phone_edit;
            $list->email = $request->email_edit;
            $list->id_line = $request->id_line_edit;
            $list->gender = $request->gender_edit;
            $list->id_user = auth()->user()->id;
            $list->id_instagram = $request->id_instagram_edit;
            $list->save();
            $users = User::where('role', 1)->get();
            Notification::send($users, new TargetUpdated($list));
            return redirect ('targetmarket');
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
            $list = TargetMModel::where('id', $id)->delete();
            $users = User::where('role', 1)->get();
            Notification::send($users, new TargetDestroyed($list));
            if($list){
                return redirect('targetmarket');
            }

        }else{
            return redirect ('dashboard');
        }
    }
}

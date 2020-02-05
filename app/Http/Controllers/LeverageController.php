<?php

namespace App\Http\Controllers;

use App\InstituteModel;
use App\PeopleModel;
use App\MediaModel;
use App\InfluencerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Notifications\InstituteCreated;
use App\Notifications\InstituteUpdated;
use App\Notifications\InstituteDestroyed;
use App\Notifications\PeopleCreated;
use App\Notifications\PeopleUpdated;
use App\Notifications\PeopleDestroyed;
use App\Notifications\MediaCreated;
use App\Notifications\MediaUpdated;
use App\Notifications\MediaDestroyed;
use App\Notifications\InfluencerCreated;
use App\Notifications\InfluencerUpdated;
use App\Notifications\InfluencerDestroyed;
use Illuminate\Support\Facades\Notification;

class LeverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if(auth()->user()->role==2 || auth()->user()->role==1){
            $leverage_institute = InstituteModel::all(); 
            $enhancement_institute = InstituteModel::whereMonth('created_at', date('n'))->count(); 
            $visited_institute = InstituteModel::where('visited', 1)->count();  
            $enhancement_media = MediaModel::whereMonth('created_at', date('n'))->count();
            $goal_media = MediaModel::where('coorporate', 1)->count();
            $goal_influencer = InfluencerModel::where('coorporate', 1)->count();  
            $enhancement_people = PeopleModel::whereMonth('created_at', date('n'))->count(); 
            $enhancement_influencer = InfluencerModel::whereMonth('created_at', date('n'))->count();
            $leverage_people = PeopleModel::all();
            $leverage_media = MediaModel::all();
            $leverage_influencer = InfluencerModel::all();
            
            return view('marketingstrategy.leverage', [
                'leverages_institute'=>$leverage_institute,
                'leverages_people'=> $leverage_people, 
                'leverages_media'=>$leverage_media,
                'leverages_influencer'=>$leverage_influencer,
                'visited_institute'=>$visited_institute,
                'goal_media'=>$goal_media,
                'goal_influencer'=>$goal_influencer,
                'enhancement_influencer'=>$enhancement_influencer,
                'enhancement_people'=>$enhancement_people,
                'enhancement_media'=>$enhancement_media,
                'enhancement_institute'=>$enhancement_institute]);
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
        
            if ($request->leverage_list==1) {
                $validator =  Validator::make($request->all(),
                    [
                    'institute_name'=> 'required',
                    'institute_address' => 'required',
                    'institute_total_student' => 'required',
                    'institute_visited' => 'required',
                    'institute_date' => 'required'
                ]);

                if ($validator->fails()){
                    return redirect ('leverage')->withErrors($validator)->withInput();
                }

                $list = new InstituteModel;
                $list->institute = $request->institute_name;
                $list->address = $request->institute_address;
                $list->total_student = $request->institute_total_student;
                $list->visited = $request->institute_visited;
                $list->date = $request->institute_date;
                $list->id_status = 1;
                $list->id_user = auth()->user()->id;
                $list->save();
                $users = User::where('role', 1)->get();
                Notification::send($users, new InstituteCreated($list));
            }
            else if($request->leverage_list==2){
                $validator =  Validator::make($request->all(),
                    [
                    'people_jobdesc'=> 'required',
                ]);

                if ($validator->fails()){
                    return redirect ('leverage')->withErrors($validator)->withInput();
                }

                $list = new PeopleModel;
                $list->jobdesc = $request->people_jobdesc;
                $list->id_user = auth()->user()->id;
                $list->id_status = 1;
                $list->save();
                $users = User::where('role', 1)->get();
                Notification::send($users, new PeopleCreated($list));
           }
           else if($request->leverage_list==3){
                $validator =  Validator::make($request->all(),
                    [
                    'media_name'=> 'required',
                    'media_address' => 'required',
                    'media_total_viewer' => 'required',
                    'media_coorporate' => 'required',
                    'media_date' => 'required'
                ]);

                if ($validator->fails()){
                    return redirect ('leverage')->withErrors($validator)->withInput();
                }

                $list = new MediaModel;
                $list->name = $request->media_name;
                $list->address = $request->media_address;
                $list->total_viewer = $request->media_total_viewer;
                $list->coorporate = $request->media_coorporate;
                $list->date = $request->media_date;
                $list->id_user = auth()->user()->id;
                $list->id_status = 1;
                $list->save();
                $users = User::where('role', 1)->get();
                Notification::send($users, new MediaCreated($list));
           }
           else if($request->leverage_list==4){
                $validator =  Validator::make($request->all(),
                    [
                    'influencer_name'=> 'required',
                    'influencer_address' => 'required',
                    'influencer_total_viewer' => 'required',
                    'influencer_coorporate' => 'required',
                    'influencer_date' => 'required'
                ]);

                if ($validator->fails()){
                    return redirect ('leverage')->withErrors($validator)->withInput();
                }

                $list = new InfluencerModel;
                $list->name = $request->influencer_name;
                $list->address = $request->influencer_address;
                $list->total_viewer = $request->influencer_total_viewer;
                $list->coorporate = $request->influencer_coorporate;
                $list->date = $request->influencer_date;
                $list->id_user = auth()->user()->id;
                $list->id_status = 1;
                $list->save();
                $users = User::where('role', 1)->get();
                Notification::send($users, new InfluencerCreated($list));
             }
             return redirect ('leverage');

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
            if($request->select_leverage_edit==1){
                if($request->institute_status_edit){
                    $validator =  Validator::make($request->all(),
                    [
                        'institute_note_edit'=> 'required',
                        'institute_status_edit' => 'required'
                    ]);

                    if ($validator->fails()){
                        return redirect ('leverage')->withErrors($validator)->withInput();
                    }

                    $list = InstituteModel::find($id);
                    $list->id_status = $request->institute_status_edit;
                    $list->id_user = auth()->user()->id;
                    $list->note = $request->institute_note_edit;
                    $list->save();
                    $users = User::where('role', 2)->get();
                    Notification::send($users, new InstituteStatusChanged($list));
                }else{                
                    $validator =  Validator::make($request->all(),
                    [
                        'institute_name_edit'=> 'required',
                        'institute_address_edit' => 'required',
                        'institute_total_student_edit' => 'required',
                        'institute_visited_edit' => 'required',
                        'institute_date_edit' => 'required'
                    ]);

                    if ($validator->fails()){
                        return redirect ('leverage')->withErrors($validator)->withInput();
                    }

                    $list = InstituteModel::find($id);
                    $list->institute = $request->institute_name_edit;
                    $list->address = $request->institute_address_edit;
                    $list->total_student = $request->institute_total_student_edit;
                    if($list->visited!=$request->institute_visited_edit){
                        $list->visited = $request->institute_visited_edit;
                        $users = User::where('role', 1)->get();
                        Notification::send($users, new InstituteVisitChanged($list));
                    }
                    $list->date = $request->institute_date_edit;
                    $list->id_user = auth()->user()->id;
                    $list->save();
                    $users = User::where('role', 1)->get();
                    Notification::send($users, new InstituteUpdated($list));
                }
            }
            else if($request->select_leverage_edit==2){
                if($request->people_status_edit){
                    $validator =  Validator::make($request->all(),
                    [
                        'people_note_edit'=> 'required',
                        'people_status_edit' => 'required'
                    ]);

                    if ($validator->fails()){
                        return redirect ('leverage')->withErrors($validator)->withInput();
                    }

                    $list = PeopleModel::find($id);
                    $list->id_status = $request->people_status_edit;
                    $list->id_user = auth()->user()->id;
                    $list->note = $request->people_note_edit;
                    $list->save();
                    $users = User::where('role',2)->get();
                    Notification::send($users, new PeopleStatusChanged($list));
                }else{
                     $validator =  Validator::make($request->all(),
                        [
                        'people_jobdesc_edit'=> 'required',
                    ]);

                    if ($validator->fails()){
                        return redirect ('leverage')->withErrors($validator)->withInput();
                    }

                    $list = PeopleModel::find($id);
                    $list->jobdesc = $request->people_jobdesc_edit;
                    $list->id_user = auth()->user()->id;
                    $list->save();
                    $users = User::where('role', 1)->get();
                    Notification::send($users, new PeopleUpdated($list));
                }
            }
            else if($request->select_leverage_edit==3){
                if($request->media_status_edit){
                    $validator =  Validator::make($request->all(),
                    [
                        'media_note_edit'=> 'required',
                        'media_status_edit' => 'required'
                    ]);

                    if ($validator->fails()){
                        return redirect ('leverage')->withErrors($validator)->withInput();
                    }

                    $list = MediaModel::find($id);
                    $list->id_status = $request->media_status_edit;
                    $list->id_user = auth()->user()->id;
                    $list->note = $request->media_note_edit;
                    $list->save();
                    $users = User::where('role',2)->get();
                    Notification::send($users, new MediaStatusChanged($list));
                }else{
                     $validator =  Validator::make($request->all(),
                        [
                        'media_name_edit'=> 'required',
                        'media_address_edit' => 'required',
                        'media_total_viewer_edit' => 'required',
                        'media_coorporate_edit' => 'required',
                        'media_date_edit' => 'required',
                        'media_note_edit'=> 'required'
                    ]);

                    if ($validator->fails()){
                        return redirect ('leverage')->withErrors($validator)->withInput();
                    }

                    $list = MediaModel::find($id);
                    $list->name = $request->media_name_edit;
                    $list->address = $request->media_address_edit;
                    $list->total_viewer = $request->media_total_viewer_edit;
                    if($list->coorporate!=$request->media_coorporate_edit){
                        $list->coorporate = $request->media_coorporate_edit;
                        $users = User::where('role', 1)->get();
                        Notification::send($users, new MediaCoorporateChanged($list));
                    }
                    $list->date = $request->media_date_edit;
                    $list->id_user = auth()->user()->id;
                    $list->note = $request->media_note_edit;
                    $list->save();
                    $users = User::where('role', 1)->get();
                    Notification::send($users, new MediaUpdated($list));
                }
            }
            else if($request->leverage_list==4){
                if($request->influencer_status_edit){
                    $validator =  Validator::make($request->all(),
                    [
                        'influencer_note_edit'=> 'required',
                        'influencer_status_edit' => 'required'
                    ]);

                    if ($validator->fails()){
                        return redirect ('leverage')->withErrors($validator)->withInput();
                    }

                    $list = MediaModel::find($id);
                    $list->id_status = $request->influencer_status_edit;
                    $list->id_user = auth()->user()->id;
                    $list->note = $request->influencer_note_edit;
                    $list->save();
                    $users = User::where('role',2)->get();
                    Notification::send($users, new InfluencerStatusChanged($list));
                }else{
                    $validator =  Validator::make($request->all(),
                        [
                        'influencer_name_edit'=> 'required',
                        'influencer_address_edit' => 'required',
                        'influencer_total_viewer_edit' => 'required',
                        'influencer_coorporate_edit' => 'required',
                        'influencer_date_edit' => 'required',
                        'influencer_note_edit'=> 'required'
                    ]);

                    if ($validator->fails()){
                        return redirect ('leverage')->withErrors($validator)->withInput();
                    }

                    $list = InfluencerModel::find($id);
                    $list->name = $request->influencer_name_edit;
                    $list->address = $request->influencer_address_edit;
                    $list->total_viewer = $request->influencer_total_viewer_edit;
                    if($list->coorporate!=$request->influencer_coorporate_edit){
                        $list->coorporate = $request->influencer_coorporate_edit;
                        $users = User::where('role', 1)->get();
                        Notification::send($users, new InfluencerCoorporateChanged($list));
                    }
                    $list->date = $request->influencer_date_edit;
                    $list->id_user = auth()->user()->id;
                    $list->note = $request->influencer_note_edit;
                    $list->save();
                    $users = User::where('role', 1)->get();
                    Notification::send($users, new InfluencerUpdated($list));
            }
            return redirect ('leverage');           

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
    //DESTROY
    public function destroy($id)
    {

    }

    public function delete(Request $request)
    {
        if(auth()->user()->role==2){
            if($request->select_leverage_delete==1)
            {
                $list = InstituteModel::where('id',  $request->delete_id);
                $list->delete();
                $users = User::where('role', 1)->get();
                Notification::send($users, new InstituteDestroyed($list));
            } 
            else if($request->select_leverage_delete==2)
            {
                $list = PeopleModel::where('id', $request->delete_id);
                $list->delete();
                $users = User::where('role', 1)->get();
                Notification::send($users, new PeopleDestroyed($list));
            }
            else if($request->select_leverage_delete==3)
            {
                $list = MediaModel::where('id', $request->delete_id);
                $list->delete();
                $users = User::where('role', 1)->get();
                Notification::send($users, new MediaDestroyed($list));
            }
            else
            {
                $list = InfluencerModel::where('id', $request->delete_id);
                $list->delete();
                $users = User::where('role', 1)->get();
                Notification::send($users, new InfluencerDestroyed($list));
            }
            return redirect('leverage');
             

        }else{
            return redirect ('dashboard');
        }
    }

}

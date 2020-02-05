<?php

namespace App\Http\Controllers;

use App\ProgramModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = ProgramModel::all();
        return view('setting.program', ['programs'=>$program]);
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
            'name'=> 'required',
            'cost' => 'required',
           
            ]);

        if ($validator->fails()){
            return redirect ('program')->withErrors($validator)->withInput();
        }

        $list = new ProgramModel;
        $list->nama = $request->name;
        $list->cost = $request->cost;
        $list->id_user = auth()->user()->id;
        $list->save();
        return redirect ('program');
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
            'name_edit'=> 'required',
            'cost_edit' => 'required',
            
            ]);

        if ($validator->fails()){
            return redirect ('program')->withErrors($validator)->withInput();
        }

        $list = ProgramModel::find($id);
        $list->nama = $request->name_edit;
        $list->cost = $request->cost_edit;
        $list->id_user = auth()->user()->id;
        $list->save();
        return redirect ('program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = ProgramModel::where('id', $id)->delete();
        if($list){
            return redirect('program');
        }
    }
}

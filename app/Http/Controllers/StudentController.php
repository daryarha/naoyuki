<?php

namespace App\Http\Controllers;

use App\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ClassModel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $student = StudentModel::all();
        $class = ClassModel::all();
        return view('academic.student', ['students'=>$student, 'classes'=>$class]);
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
            'address' => 'required',
            'class' => 'required',
            ]);

        if ($validator->fails()){
            return redirect ('student')->withErrors($validator)->withInput();
        }

        $list = new StudentModel;
        $list->name = $request->name;
        $list->address = $request->address;
        $list->id_class = $request->class;
        $list->id_user = auth()->user()->id;
        $list->save();
        return redirect ('student');
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
            'address_edit' => 'required',
            'class_edit' => 'required',
            ]);

        if ($validator->fails()){
            return redirect ('student')->withErrors($validator)->withInput();
        }

        $list = StudentModel::find($id);
        $list->name = $request->name_edit;
        $list->address = $request->address_edit;
        $list->id_class = $request->class_edit;
        $list->id_user = auth()->user()->id;
        $list->save();
        return redirect ('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = StudentModel::where('id', $id)->delete();
        if($list){
            return redirect('student');
        }
    }
}

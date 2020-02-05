<?php

namespace App\Http\Controllers;

use App\MateriModel;
use App\ClassMateriModel;
use App\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($class_name)
    {
        $materi = MateriModel::whereHas('class', function(Builder $query) use($class_name){
            $query->where('name','like', $class_name);
        })->get();
        return view('academic.materi', ['materi'=>$materi]);
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
            'filename'=> 'required|mimes:doc,docx,pdf',
        ]);

        if ($validator->fails()){
            return redirect ('class/'.$request->class_name.'/materi')->withErrors($validator)->withInput();
        }

        $materi_class = new ClassMateriModel;
        $materi = new MateriModel;
        if($request->file('filename')->isValid()){
            $materi->m_id = (string) Str::uuid();
            $materi->id_user = auth()->user()->id;
            $filename = explode("/", $request->file('filename')->storeAs('materi', $request->file('filename')->getClientOriginalName()));
            $materi->filename = $filename[1];
            if($materi->save()){
                $id_materi = $materi->id;
                $materi_class->id_materi = $id_materi;
                $materi_class->id_user = auth()->user()->id;
                $name = explode("/", url()->previous())[4];
                $materi_class->id_class =  ClassModel::where('name', $name)->firstOrFail()->id;
                $materi_class->save();
                return redirect ('class/'.explode("/", url()->previous())[4].'/materi');
            }
            // $materi_class=$name;
        }
    }
    public function download($m_id){
        $materi = MateriModel::where('m_id', $m_id)->firstOrFail();
        $pathToFile = storage_path('app/materi/'.$materi->filename);
        // return Storage::download($pathToFile);
        return response()->download($pathToFile);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = ClassMateriModel::where('id_materi', $id);
        $class_materi = ClassModel::where('id', $class->firstOrFail()->id_class)->firstOrFail();
        $class->delete();
        $materi = MateriModel::where('id', $id)->delete();
        if($materi){    
            return redirect('class/'.$class_materi->name.'/materi');
        }
    }
}

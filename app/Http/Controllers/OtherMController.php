<?php

namespace App\Http\Controllers;


use App\MateriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class OtherMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $other = MateriModel::doesntHave('class')->get();
        return view('academic.other', ['others'=>$other]);
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
            return redirect ('other')->withErrors($validator)->withInput();
        }

        $materi = new MateriModel;
        if($request->file('filename')->isValid()){
            $materi->m_id = (string) Str::uuid();
            $materi->id_user = auth()->user()->id;
            $filename = explode("/", $request->file('filename')->storeAs('materi', $request->file('filename')->getClientOriginalName()));
            $materi->filename = $filename[1];
            $materi->save();
            return redirect ('other');
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
        $materi = MateriModel::where('id', $id)->delete();
        if($materi){    
            return redirect('other');
        }
    }
}

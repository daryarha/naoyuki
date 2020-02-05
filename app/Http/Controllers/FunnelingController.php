<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FunnelingModel;
use Illuminate\Support\Facades\Validator;

class FunnelingController extends Controller
{
    
    public function store(Request $request)
    {
        //

         $validator =  Validator::make($request->all(),
            [
            'total_people'=> 'required',
            'brand'=> 'required',
            'market'=> 'required',
            'selling'=> 'required'

        ]);

        if ($validator->fails()){
            return redirect ('targetmarket')->withErrors($validator)->withInput();
        }

        $list = new FunnelingModel;
        $list->total_people = $request->total_people;
        $list->brand = $request->brand;
        $list->market = $request->market;
        $list->selling = $request->selling;
        $list->id_user = auth()->user()->id;


        $list->save();
        return redirect ('targetmarket');
    }

    public function destroy($id)
    {
        //
        $list = FunnelingModel::where('id', $id)->delete();
        if($list){
            return redirect('targetmarket');
        }
    }
}

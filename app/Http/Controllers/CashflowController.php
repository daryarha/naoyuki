<?php

namespace App\Http\Controllers;

use App\CashflowModel;
use App\CashFCategoryModel;
use Illuminate\Http\Request;
use App\User;
use App\Notifications\CashflowCreated;
use App\Notifications\CashflowUpdated;
use App\Notifications\CashflowDestroyed;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashflows = CashflowModel::all();
        $category = CashFCategoryModel::all();
        return view('finance.cashflow', ['cashflows'=>$cashflows, 'categories'=>$category]);
    }

    public function monthly()
    {
        // return CashflowModel::all();
        $years = CashflowModel::select(DB::raw('distinct(year(date)) as year'))->get(); 
        // $years = $years[0];
        return view('finance.monthly', ['years'=>$years]);
    }
    
    public function annual()
    {
        return view('finance.annual');
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
            'transaction'  =>'required',
            'nominal'      =>'required',
            'd_k'          =>'required',
            'category'     =>'required'
        ]);

        if ($validator->fails()){
            return redirect ('cashflow')->withErrors($validator)->withInput();
        }


        $list = new CashflowModel;
        $list->transaction = $request->transaction;
        $list->nominal = $request->nominal;
        $list->d_k = $request->d_k;
        $list->id_category = $request->category;
        $list->id_user = auth()->user()->id;
        $list->save();
        $users = User::all();
    	Notification::send($users, new CashflowCreated($list));
        return redirect('cashflow');

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
            'transaction_edit'  =>'required',
            'nominal_edit'      =>'required',
            'd_k_edit'          =>'required',
            'category_edit'     =>'required'
        ]);

        if ($validator->fails()){
            return redirect ('cashflow')->withErrors($validator)->withInput();
        }

        $list = CashflowModel::find($id);
        $list->transaction = $request->transaction_edit;
        $list->nominal = $request->nominal_edit;
        $list->d_k = $request->d_k_edit;
        $list->id_user = auth()->user()->id;
        $list->id_category = $request->category_edit;

        $list->save();
        $users = User::all();
    	Notification::send($users, new CashflowUpdated($list));
        return redirect('cashflow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CashflowModel::find($id);
        $data->delete();
        $users = User::all();
    	Notification::send($users, new CashflowDestroyed($data));
        return redirect('cashflow');
    }
}

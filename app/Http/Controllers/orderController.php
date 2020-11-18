<?php

namespace App\Http\Controllers;

use App\Models\orderModel;

use Illuminate\Http\Request;

class orderController extends Controller
{
    //Show all order
    public function index(){
        $data = orderModel::all();
        return response($data);
    }

    //Show order data based on id
    public function show($id_order){
        $data = orderModel::where('id_order',$id_order)->get();
        return response ($data);
    }

    //Save new order data
    public function store (Request $request){
        $data = new orderModel();
        $data->tgl_booking = $request->input('tgl_booking');
        $data->save();
    
        return response('Order is successfully added.');
    }

    //Change order
    public function update(Request $request, $id_order){
        $data = orderModel::where('id_order',$id_order)->first();
        $data->tgl_booking = $request->input('tgl_booking');
        $data->save();
    
        return response('Order is successfully changed.');
    }
    
    //Delete order
    public function destroy($id_psikolog){
        $data = orderModel::where('id_order',$id_order)->first();
        $data->delete();
    
        return response('Order is successfully deleted.');
    }
}

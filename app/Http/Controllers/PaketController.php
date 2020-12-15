<?php

namespace App\Http\Controllers;

use App\Models\PaketModel;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    //Show all paket data
    public function index(){
        $data = PaketModel::all();
        return response($data);
    }

    //Show paket data based on ID
    public function show($id_paket){
        $data = PaketModel::where('id_paket',$id_paket)->get();
        return response ($data);
    }

    //Save paket data
    public function store (Request $request){
        $data = new PaketModel();
        $data->nama_paket = $request->input('nama_paket');
        $data->jenis_paket = $request->input('jenis_paket');
        $data->harga_paket = $request->input('harga_paket');
        $data->save();
    
        return response('Paket data is successfully added.');
    }
}

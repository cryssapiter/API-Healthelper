<?php

namespace App\Http\Controllers;

use App\Models\artikelModel;

use Illuminate\Http\Request;

class artikelController extends Controller
{
    
    public function index(){
        $data = artikelModel::all();
        return response($data);
    }
    public function show($id_artikel){
        $data = artikelModel::where('id_artikel',$id_artikel)->get();
        return response ($data);
    }
    public function store (Request $request){
        $data = new artikelModel();
        $data->tema_artikel = $request->input('tema_artikel');
        $data->isi_artikel = $request->input('isi_artikel');
        $data->save();
    
        return response('Data is successfully added.');
    }

    public function update(Request $request, $id_artikel){
        $data = artikelModel::where('id_artikel',$id_artikel)->first();
        $data->tema_artikel = $request->input('tema_artikel');
        $data->isi_artikel = $request->input('isi_artikel');
        $data->save();
    
        return response('Data is successfully changed.');
    }
    
    public function destroy($id_artikel){
        $data = artikelModel::where('id_artikel',$id_artikel)->first();
        $data->delete();
    
        return response('Data is successfully deleted.');
    }
}

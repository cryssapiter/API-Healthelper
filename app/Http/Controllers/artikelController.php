<?php

namespace App\Http\Controllers;

use App\Models\artikelModel;

use Illuminate\Http\Request;

class artikelController extends Controller
{
    //Show all article data
    public function index(){
        $data = artikelModel::all();
        return response($data);
    }

    //Show article data based on ID
    public function show($id_artikel){
        $data = artikelModel::where('id_artikel',$id_artikel)->get();
        return response ($data);
    }

    //Save article data
    public function store (Request $request){
        $data = new artikelModel();
        $data->tema_artikel = $request->input('tema_artikel');
        $data->isi_artikel = $request->input('isi_artikel');
        $data->save();
    
        return response('Article data is successfully added.');
    }

    //Change article data
    public function update(Request $request, $id_artikel){
        $data = artikelModel::where('id_artikel',$id_artikel)->first();
        $data->tema_artikel = $request->input('tema_artikel');
        $data->isi_artikel = $request->input('isi_artikel');
        $data->save();
    
        return response('Article data is successfully changed.');
    }
    
    //Delete article data
    public function destroy($id_artikel){
        $data = artikelModel::where('id_artikel',$id_artikel)->first();
        $data->delete();
    
        return response('Article data is successfully deleted.');
    }
}

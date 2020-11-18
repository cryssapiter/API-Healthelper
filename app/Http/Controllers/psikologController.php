<?php

namespace App\Http\Controllers;

use App\Models\psikologModel;

use Illuminate\Http\Request;

class psikologController extends Controller
{
    //Show all psychologist data
    public function index(){
        $data = psikologModel::all();
        return response($data);
    }

    //Show psychologist data based on ID
    public function show($id_psikolog){
        $data = psikologModel::where('id_psikolog',$id_psikolog)->get();
        return response ($data);
    }

    //Save new psychologist data
    public function store (Request $request){
        $data = new psikologModel();
        $data->nama_psikolog = $request->input('nama_psikolog');
        $data->tahun_psikolog = $request->input('tahun_psikolog');
        $data->deskripsi_psikolog = $request->input('deskripsi_psikolog');
        $data->save();
    
        return response('Psychologist data is successfully added.');
    }

    //Change psychologist data
    public function update(Request $request, $id_psikolog){
        $data = psikologModel::where('id_psikolog',$id_psikolog)->first();
        $data->nama_psikolog = $request->input('nama_psikolog');
        $data->tahun_psikolog = $request->input('tahun_psikolog');
        $data->deskripsi_psikolog = $request->input('deskripsi_psikolog');
        $data->save();
    
        return response('Psychologist data is successfully changed.');
    }
    
    //Delete psychologist data
    public function destroy($id_psikolog){
        $data = psikologModel::where('id_psikolog',$id_psikolog)->first();
        $data->delete();
    
        return response('Psychologist data is successfully deleted.');
    }
}

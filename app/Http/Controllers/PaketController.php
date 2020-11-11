<?php

namespace App\Http\Controllers;

use App\Models\PaketModel;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    // Fungsi Read
    public function show($id_paket){
        $data = PaketModel::where('id_paket',$id_paket)->get();
        return response ($data);
    }

    //Fungsi Create
    public function store(Request $request){
        $data = new PaketModel();
        $data->jenis_konsultasi = $request -> input('jenis_konsultasi');
        $data->id_user = $request -> input('id_user');
        $data->save();
        return response('Data paket berhasil ditambahkan');
    }

    //Fungsi Update
    public function update(Request $request, $id_paket){
        $data = PaketModel::where('id_paket',$id_paket)->first();
        $data->jenis_konsultasi = $request -> input('jenis_konsultasi');
        $data->save();
        return response('Data paket berhasil diupdate');
    }

    // Fungsi Delete
    public function destroy($id_paket){
        $data = PaketModel::where('id_paket',$id_paket)->first();
        $data->delete();
        return response('Data paket berhasil dihapus');
    }
}

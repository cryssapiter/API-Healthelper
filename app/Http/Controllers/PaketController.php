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
}

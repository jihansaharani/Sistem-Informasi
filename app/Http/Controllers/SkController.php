<?php

namespace App\Http\Controllers;

use App\Models\sk;
use Illuminate\Http\Request;

class SkController extends Controller
{
    public function syarat(){
        $data = sk::all();
        return view('syarat.syarat', compact('data'));
    }

    public function editsyarat($id){
        $data = sk::Find($id);
        return view('syarat.editsyarat', compact('data'));
    }

    public function updatesyarat(Request $request, $id){
        $this->validate($request, [
            'syarat' => 'required',
        ],[
            'syarat.required' => 'Syarat Harus Diisi Tidak Boleh Kosong',
        ]);
        $data = sk::Find($id);
        $data->syarat = $request->syarat;
        $data->save();
        return redirect('syarat')->with('succes', 'Data Berhasil DiUpdate');
    }
}

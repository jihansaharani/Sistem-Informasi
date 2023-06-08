<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function storepesan(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required',
            'subjek' => 'required',
            'pesan' => 'required'
        ],[
            'nama.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'subjek.required' => 'Subjek Harus Diisi',
            'pesan.required' => 'Pesan Harus Diisi'
        ]);
        $data = pesan::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'subjek'=>$request->subjek,
            'pesan'=>$request->pesan,
        ]);
        return redirect()->route('/kontak')->with('success', 'Pesan Berhasil Terkirim');
    }
}

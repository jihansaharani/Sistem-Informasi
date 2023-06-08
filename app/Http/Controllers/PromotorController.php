<?php

namespace App\Http\Controllers;

use App\Models\guest;
use App\Models\produk;
use App\Models\promotor;
use Illuminate\Http\Request;

class PromotorController extends Controller
{
    public function tabelpromotor(Request $request){
        $cari = $request->input('cari');
        $keyword = $request->cari;
        $data = promotor::orderBy('namapromotor', 'asc')
        ->where('namapromotor', 'LIKE', '%' . $cari . '%')
        ->paginate(1);

        $data->appends(['cari' => $cari]);
        return view('promotor.tabel-promotor',compact('data'));
    }

    public function hapuspromotor($id){
        $count = produk::where('user_id', $id)->count();
        if ($count > 0) {
            return back()->with('error', 'Promotor Masih Memiliki Produk!');
        }
        $data = promotor::find($id);
        $data->delete();
        return redirect('tabelpromotor')->with('success', 'Data Berhasi Dihapus');
    }

    public function tabelguest(Request $request){
        $cari = $request->input('cari');
        $keyword = $request->cari;
        $data = guest::orderBy('namaguest', 'asc')
        ->where('namaguest', 'LIKE', '%' . $cari . '%')
        ->paginate(1);

        $data->appends(['cari' => $cari]);
        return view('guest.tabelguest',compact('data'));
    }

    public function hapusguest($id){
        $data = guest::find($id);
        $data->delete();
        return redirect('tabelguest')->with('success', 'Data Berhasi Dihapus');
    }

}

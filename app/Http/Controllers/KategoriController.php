<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{

    public function tabelkategori(Request $request){
        $data = kategori::all();
        return view('kategori.tabel-kategori',['data' =>$data]);
    }

    public function tambahkategori(){
        $data = kategori::all();
        return view('kategori.tambah-kategori',['data' => $data]);
    }

    public function storekategori(Request $request){
        $this->validate($request, [
            'kategori' => 'required',
            'fotoproduk' => 'image|mimes:jpg,png,jpeg|max:2048|required',
        ],[
            'kategori.required' => 'Nama Kategori Harus Diisi',
            'fotoproduk.required' => 'Foto Kategori harus Diisi',
            'fotoproduk.image' => 'Foto Kategori harus berisi File Foto',
            'fotoproduk.mimes' => 'Foto Kategori harus berupa ekstensi jpg, png, jpeg',
            'fotoproduk.max' => 'Foto Kategori maksimal berukuran 2MB',
        ]);
        if ($files = $request->file('fotoproduk')) {
            $extension = $files->getClientOriginalExtension();
            $name = hash('sha256', time()) . '.' . $extension;
            $files->move('fotoproduk', $name);
        }

        $data = kategori::create([
            'kategori'=>$request->kategori,
            'fotoproduk'=>$name,

        ]);
        return redirect()->route('tabel.kategori')->with('success', 'Data Berhasi DiTambahkan');
    }

    public function editkategori($id){
        $data = kategori::Find($id);
        return view('kategori.edit-kategori',['data' => $data]);
    }

    public function updatekategori(Request $request,$id){
        $this->validate($request, [
            'kategori'  => 'required',
            'fotoproduk' => 'image|mimes:jpg,png,jpeg|max:2048',
        ],[
            'kategori.required' => 'Nama Kategori Harus Diisi',
            'fotoproduk.image' => 'Foto Kategori harus berisi File Foto',
            'fotoproduk.mimes' => 'Foto Kategori harus berupa ekstensi jpg, png, jpeg',
            'fotoproduk.max' => 'Foto Kategori maksimal berukuran 2MB',
        ]);
        $data = kategori::Find($id);
        if($request->hasFile('fotoproduk')){
            //hapus foto lama
            Storage::delete($data->fotoproduk);
            //simpan foto baru
            $request->file('fotoproduk')->move('fotoproduk/',$request->file('fotoproduk')->getClientOriginalName());
            $data->fotoproduk = $request->file('fotoproduk')->getClientOriginalName();
        }else{
            $data->fotoproduk = $request->default;
        }
        $data->kategori = $request->kategori;
        $data->save();
        return redirect('tabelkategori')->with('success', 'Data Berhasi DiUpdate');
    }
    
    public function hapuskategori($id){
        $count = produk::where('kategoripromo', $id)->count();
        if ($count > 0) {
            return back()->with('error', 'Kategori Data Masih Digunakan Pada Promo!');
        }
        $count = kategori::where('fotoproduk', $id)->count();
        if ($count > 0) {
            return back()->with('error', 'Kategori Data Masih Digunakan Pada Promo!');
        }
        $data = kategori::find($id);
        $data->delete();
        return redirect('tabelkategori')->with('success', 'Data Berhasi Di Hapus');
    }
}

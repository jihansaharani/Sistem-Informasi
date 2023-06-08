<?php

namespace App\Http\Controllers;

use App\Models\banners;
use App\Models\kategori;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class BannerController extends Controller
{
    public function tabelbanner(Request $request){
        $data = banners::all();
        // dd($data);
        return view('banner.tabel-banner',['data' => $data]);
    }

    // public function tambahbanner(){
    //     $data = banner::all();
    //     return view('banner.tambah-banner',['data' => $data]);
    // }
    // public function storebanner(Request $request){

    //     $data = banner::create([
    //         'banner'=>$request->banner
    //     ]);

    //     if($request->hasFile('banner')){
    //         $request->file('banner')->move('banner/',$request->file('banner')->getClientOriginalName());
    //         $data->banner1 = $request->file('banner')->getClientOriginalName();
    //         $request->file('banner')->move('banner/',$request->file('banner')->getClientOriginalName());
    //         $data->banner2 = $request->file('banner')->getClientOriginalName();
    //         $request->file('banner')->move('banner/',$request->file('banner')->getClientOriginalName());
    //         $data->banner3 = $request->file('banner')->getClientOriginalName();
    //     }
    //     $data->save();

    //     return redirect()->route('tabel.banner')->with('success', 'Data Berhasi DiTambahkan');
    // /
    public function editbanner($id){
        $data = banners::find($id);
        return view('banner.edit-banner',['data' => $data]);
    }
    public function updatebanner(Request $request,$id){
        $data = banners::Find($id);
        // nanti dibuat validasi foto
        $this->validate($request, [
            'banner1' => 'image|mimes:jpg,png,jpeg|max:2048',
            'banner2' => 'image|mimes:jpg,png,jpeg|max:2048',
            'banner3' => 'image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'banner1.image' => 'Banner harus berisi File Foto',
            'banner1.mimes' => 'Banner harus berupa ekstensi jpg, png, jpeg',
            'banner1.max' => 'Banner maksimal berukuran 2MB',
            'banner2.image' => 'Banner harus berisi File Foto',
            'banner2.mimes' => 'Banner harus berupa ekstensi jpg, png, jpeg',
            'banner2.max' => 'Banner maksimal berukuran 2MB',
            'banner3.image' => 'Banner harus berisi File Foto',
            'banner3.mimes' => 'Banner harus berupa ekstensi jpg, png, jpeg',
            'banner3.max' => 'Banner maksimal berukuran 2MB',
        ]);

        if($request->hasFile('banner1')){
            $request->file('banner1')->move('banner/',$request->file('banner1')->getClientOriginalName());
            $data->banner1 = $request->file('banner1')->getClientOriginalName();

        }
        if($request->hasFile('banner2')){
            $request->file('banner2')->move('banner/',$request->file('banner2')->getClientOriginalName());
            $data->banner2 = $request->file('banner2')->getClientOriginalName();

        }
        if($request->hasFile('banner3')){
            $request->file('banner3')->move('banner/',$request->file('banner3')->getClientOriginalName());
            $data->banner3 = $request->file('banner3')->getClientOriginalName();
        }
        $data->save();

        return redirect('tabelbanner')->with('success', 'Data Berhasi DiUpdate');
    }

}

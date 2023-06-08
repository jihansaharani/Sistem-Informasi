<?php

namespace App\Http\Controllers;

use App\Models\setings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SetingsController extends Controller
{
    public function setingwebsite(){
        $data = setings::all();
        return view('website.websitesetings', ['data' =>$data]);
    }

    public function editwebsite($id){
        $data = setings::Find($id);
        return view('website.editwebsite',['data' =>$data]);
    }

    public function updatewebsite(Request $request,$id){
        $this->validate($request, [
            'logowebsite' => 'image|mimes:jpg,png,jpeg|max:2048',
            'deskripsiwebsite'  => 'required',
            'email' => 'required|email',
            'notelepon'  => 'required', 'regex:/^[0-9]{10,15}$/',
            'alamat'  => 'required',
            'ig'  => 'required|url',
            'facebook'  => 'required|url',
            'twitter'  => 'required|url',
        ],[
            'logowebsite.image' => 'Logo Website harus berisi File Foto',
            'logowebsite.mimes' => 'Logo Website harus berupa ekstensi jpg, png, jpeg',
            'logowebsite.max' => 'Logo Website maksimal berukuran 2MB',
            'deskripsiwebsite.required' => 'Deskripsi Website Harus Diisi',
            'email.required' => 'Email Website Harus Diisi',
            'email.email' => 'Email Website Harus Disi Dengan Format @',
            'notelepon.required' => 'NoTelepon Website Harus Diisi',
            'notelepon.regex' => 'NoTelepon Anda Harus Memiliki Panjang 10 Hingga 15 Karakter',
            'alamat.required' => 'Alamat Website Harus Diisi',
            'ig.required' => 'Instagram Website Harus Diisi',
            'ig.url' => 'Instagram Website Harus Diisi Dengan Format https://www.',
            'facebook.required' => 'Facebook Website Harus Diisi',
            'facebook.url' => 'Facebook Website Harus Diisi Dengan Format https://www.',
            'twitter.required' => 'Twitter Website Harus Diisi',
            'twitter.url' => 'Twitter Website Harus Diisi Dengan Format https://www.',
        ]);
        $data = setings::Find($id);
        if($request->hasFile('logowebsite')){
            //hapus foto lama
            Storage::delete($data->logowebsite);
            //simpan foto baru
            $request->file('logowebsite')->move('logo/',$request->file('logowebsite')->getClientOriginalName());
            $data->logowebsite = $request->file('logowebsite')->getClientOriginalName();
        }else{
            $data->logowebsite = $request->default;
        }
        $data->deskripsiwebsite = $request->deskripsiwebsite;
        $data->email = $request->email;
        $data->notelepon = $request->notelepon;
        $data->alamat = $request->alamat;
        $data->ig = $request->ig;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->save();
        return redirect('/websitesetings')->with('success', 'Data Berhasi DiUpdate');
    }

    public function detailwebsite($id){
        $data = setings::Find($id);
        return view('website.detailwebsite',['data' =>$data]);
    }
}

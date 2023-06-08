<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\guest;
use App\Models\produk;
use App\Models\kategori;
use App\Models\promotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function loginadmin(){
    //     return view('loginadmin.login');
    // }

    // public function loginadminproses(Request $request){
    //     $this->validate($request,[
    //         'email' => 'required',
    //         'password' => 'required',
    //     ],[
    //         'email.required' => 'Email Harus Diisi',
    //         'password.required' => 'Password Harus Diisi',
    //     ]);
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'Admin'])) {
    //         return redirect('/home')->with('success','Berhasil Login Sebagai Admin');
    //     }

    //     return \redirect('login')->with('gagal', 'Akun Yang Anda Masukkan Salah');
    // }

    public function beranda(){
    $data = promotor::count();
    $datakategori = kategori::count();
    $promo = produk::count();
    $guest = guest::count();
    $diterima = produk::where('status', 1)->whereNull('pesan')->count();
    $ditolak = produk::where('status', 2)->whereNotNull('pesan')->count();
    $pending = produk::where('status', 0)->whereNull('pesan')->count();
    $expired = produk::where('masapromo', '<=' , now())->count();
    $users = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
    $months = User::select(DB::raw("Month(created_at) as months"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('months');

        $chart = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $months)
        {
            $chart[$months -1] = $users[$index];
        }
    return view('admin-home.beranda',compact('guest','data','datakategori','promo', 'diterima', 'ditolak', 'pending', 'expired'));
    }

    public function profiladmin(){
        $data = User::all();
        return view('admin-home.profileadmin',compact('data'));
    }

    public function updateprofileadmin(Request $request, $id)
    {
        $this->validate($request,[
            'fotoprofil' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ],[
            'fotoprofil.required' => 'Foto Profil Foto Harus Diisi',
            'fotoprofil.image' => 'Foto Profil Foto Harus Berisi File Foto',
            'fotoprofil.mimes' => 'Foto Profil Foto Harus Berupa Extensi jpg, png, jpeg',
            'fotoprofil.max' => 'Foto Profil Foto Maksimal Berisi 2MB',
        ]);

        $data = User::find($id);
        $data->update($request->all());

        if ($request->hasFile('fotoprofil')) {
            $file = $request->file('fotoprofil');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('fotoprofil/', $filename);
            $data->fotoprofil = $filename;
            $data->save();
        }
        return redirect('profiladmin')->with('success', 'Foto Profile Berhasil DiUpdate');
    }
    public function logout()
    {
        Auth::logout();

        return \redirect('/');
    }
}

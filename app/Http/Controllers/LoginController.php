<?php

namespace App\Http\Controllers;

use App\Models\sk;
use App\Models\User;
use App\Models\guest;
use App\Models\setings;
use App\Models\promotor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
    public function login()
    {
        $footer = setings::all();
        return view('loginpromotor.loginpromotor', compact('footer'));
    }

    public function loginproses(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);

        $remember = $request->has('remember');

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect('login')->with('gagal', 'Akun yang anda masukkan belum terdaftar');
        }

        if ($user->role === 'admin') {
            if (Auth::attempt($credentials, $remember)) {
                $user = Auth::user();
                $user->setRememberToken(Str::random(60));
                return redirect('/beranda')->with('success', 'Berhasil Login Menjadi Admin');
            }
        } else {
            if ($user->email_verified_at != null) {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'promotor'], $remember)) {
                    $user = Auth::user();
                    $user->setRememberToken(Str::random(60));
                    return redirect('/berandapromotor')->with('success', 'Berhasil Login Menjadi Promotor');
                }

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'guest'], $remember)) {
                    $user = Auth::user();
                    $user->setRememberToken(Str::random(60));
                    return redirect('/')->with('success', 'Berhasil Login Menjadi User');
                } else {
                    return redirect('login')->with('gagal', 'Email atau password salah');
                }
            } else {
                return redirect('login')->with('gagal', 'Akun anda belum terverifikasi');
            }
        }
    }


    public function registerGuest(){
        return view('loginpromotor.registeruser');
    }

    public function registerPengunjung(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:5|max:50',
        'terms' => 'accepted',
    ], [
        'name.required' => 'Nama harus diisi',
        'email.unique' => 'Email sudah dipakai',
        'email.required' => 'Email harus diisi',
        'password.required' => 'Sandi harus diisi',
        'password.min' => 'Password harus diisi minimal 5',
        'password.max' => 'Password harus diisi maksimal 50',
        'terms.accepted' => 'Anda harus menyetujui persyaratan dan ketentuan.',
    ]);

    $data = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'remember_token' => Str::random(60),
        'role' => 'guest',
    ]);

    event(new Registered($data));
    Auth::login($data);

    $guest = guest::create([
        'namaguest' => $data->name,
        'email' => $data->email,
    ]);

    return redirect('/email/verify');
}

    public function register()
    {
        return view('loginpromotor.registerpromotor');
    }

    public function registerUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:150',
            'namamerek' => 'required',
            'fotomerek' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:5|max:50',
            'terms' => 'accepted',
        ], [
            'name.required' => 'Nama harus diisi',
            'namamerek.required' => 'Nama Merek Harus Diisi',
            'fotomerek.required' => 'Foto Merek Harus Diisi',
            'fotomerek.image' => 'Foto Merek Harus Berisi File Foto',
            'fotomerek.mimes' => 'Foto Merek Harus Berupa Extensi jpg, png, jpeg',
            'fotomerek.max' => 'Foto Merek Maksimal Berisi 2MB',
            'email.unique' => 'Email sudah dipakai',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Sandi harus diisi',
            'password.min' => 'Password harus diisi minimal 5',
            'password.max' => 'Password harus diisi maksimal 50',
            'terms.accepted' => 'Anda harus menyetujui persyaratan dan ketentuan.',

        ]);

        $data = User::create([
            'name' => $request->name,
            'namamerek' => $request->namamerek,
            'fotomerek' => $request->fotomerek,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            'role' => 'promotor',
        ]);

        event(new Registered($data));
        Auth::login($data);

        $user = promotor::create([
            'user_id' => $data->id,
            'namapromotor' => $data->name,
            'namamerek' => $data->namamerek,
            'fotomerek' => $data->fotomerek,
            'email' => $data->email,
        ]);

        if ($request->hasFile('fotomerek')) {
            $request->file('fotomerek')->move('foto_merek/', $request->file('fotomerek')->getClientOriginalName());
            $foto = $request->file('fotomerek')->getClientOriginalName();
            $data->fotomerek = $foto;
            $user->fotomerek = $foto;
            $data->save();
            $user->save();
        }
        return redirect('/email/verify');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homeguest')->with('success', 'Anda sudah Logout');
    }

    public function syaratdanketentuan(){
        $data = sk::all();
        $footer = setings::all();
        return view('loginpromotor.sk', compact('data','footer'));
    }

    // public function home(){

    //     if(Auth()->check() === false){
    //         return redirect('/login');
    //     }elseif(Auth::user()->role === 'promotor'){
    //         return redirect('berandapromotor');
    //     }elseif(Auth::user()->role === 'admin'){
    //         return redirect('beranda');
    //     }elseif(Auth::user()->role === 'guest'){
    //         return redirect('/');
    //     }
    //     return redirect()->back();
    // }
}

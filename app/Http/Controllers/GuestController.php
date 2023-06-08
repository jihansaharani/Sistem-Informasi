<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\banners;
use App\Models\setings;
use App\Models\kategori;
use App\Models\promotor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function homeguest(Request $request)
    {
        $cari = $request->cari;
        $data = kategori::all();
        $datak = $data;
        $populer = produk::where('status', 1)
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->where('views', '>=', 5)
            ->where('masapromo', '>', Carbon::now())
            ->orderBy('views', 'desc')
            ->where('limit', '>', 0)
            ->get()
            ->take(5);
        $datab = banners::all();
        $brand = promotor::all();
        $now = Carbon::now();
        $baru = produk::where('status', 1)
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->orderBy('created_at', 'desc')
            ->whereDate('created_at', '>=', $now->subDays(7))
            ->orderBy('views', 'desc')
            ->where('limit', '>', 0)
            ->get()
            ->take(5);
        $unggul = produk::where('status', 1)
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->where('masapromo', '>', Carbon::now())
            ->where('views', '>=', 100)
            ->orderBy('views', 'desc')
            ->get()
            ->take(5);
        $kilat = produk::where('status', 1)
            ->where('limit', '<=', 5)
            ->where('masapromo', '>', Carbon::now())
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->where('limit', '>', 0) //menambahkan pengkondisian limit > 0
            ->get()
            ->take(5);
        $footer = setings::all();
        // $jumlahpromo = produk::where('user_id','namapromotor')->count();
        return view('home-guest.homeguest', compact('data', 'datab', 'datak', 'brand', 'populer', 'baru', 'unggul', 'kilat', 'footer'));
    }

    // public function views($id){
    //     $data = produk::find($id);
    //     $data->update([
    //         'views' => $data->views+1
    //     ]);
    // }

    public function detailbrand($brand, $id)
    {
        $banner = promotor::find($id);
        $data = kategori::all();
        $now = Carbon::now();
        $promo = produk::where('namamerek', '=', $brand)
            ->where('status', 1)
            ->whereDate('masapromo', '>=', $now)
            ->get();
        $jumlahpromo = produk::where('namamerek', '=', $brand)
            ->where('status', 1)
            ->whereDate('masapromo', '>=', $now)
            ->count();
        return view('home-guest.brandguest', compact('banner', 'promo', 'data', 'jumlahpromo'));
    }

    public function faq()
    {
        $data = kategori::all();
        $footer = setings::all();
        return view('faq.faq', compact('data','footer'));
    }

    public function kontak()
    {
        $footer = setings::all();
        $data = kategori::all();
        return view('home-guest.kontak', compact('data','footer'));
    }

    public function tentangkami()
    {
        $data = kategori::all();
        $footer = setings::all();
        return view('home-guest.tentangkami', compact('data','footer'));
    }

    public function promoterpopuler($id)
    {
        $data = produk::where('masapromo', '>=', now())
            ->where('masapromo', '>', now()) // hanya tampilkan produk yang masa promo-nya masih di masa depan
            ->get();

        foreach ($data as $produk) {
            $produk->views += 1;
            $produk->save();
        }
    }
    public function daftarklaim(Request $request)
    {
        $keyword = $request->cari;
        $user = Auth::user()->id;
        $produk = produk::where('used_by_guest', $user)->get();

        $data = kategori::all();
        $datak = $data;
        $data = produk::where('status', 1)
            ->where('namapromo', 'LIKE', '%' . $request->cari . '%')
            ->where('masapromo', '>=', now())
            ->where('user_id', auth()->id())
            ->where(function ($query) use ($user) {
                $query->where('used_by_guest', $user)
                    ->orWhere('used_by_guest', '!=', $user);
            })
            ->paginate(2);
        $data->appends(['cari' => $keyword]);

        return view('home-guest.daftarklaim', compact('data', 'datak', 'produk'));
    }

}

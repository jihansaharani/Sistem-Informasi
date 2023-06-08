<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\setings;
use App\Models\bookmark;
use App\Models\kategori;
use App\Models\notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProdukSimpleController extends Controller
{
    // public function produksimple($kategori){
    //     $data = kategori::find($kategori);
    //     return view('produksimple.produksimple', compact('data'));
    // }

    public function detailkategori(Request $request, $kategori, $id)
    {
        $cari = $request->cari;
        $data = kategori::where('kategori', $kategori)->firstOrFail();
        $kategori = kategori::all();
        $now = Carbon::now();
        $footer = setings::all();
        $promo = produk::where('status', 1)
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->where('kategoripromo', '=', $id)
            ->whereDate('masapromo', '>=', $now)
            ->get();

        return view('produksimple.produksimple', compact('data', 'promo', 'kategori', 'footer'));
    }

    public function tampilpopuler(Request $request)
    {
        $cari = $request->input('cari');
        $kategori = Kategori::all();
        $query = Produk::query();
        if ($request->has('category')) {
            $category = $request->input('category');
            $query->where('category', $category);
        }
        $products = $query->get();
        $data = Produk::where('status', 1)
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->paginate(1);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('home-guest.tampilpopuler-ajax', compact('data'))->render(),
            ]);
        }
        $data->appends(['cari' => $cari]);

        return view('home-guest.tampilpopuler', compact('data', 'kategori', 'query'));
    }

    public function tampilterbaru()
    {
        $kategori = kategori::all();
        $data = produk::where('status', 1)->get();
        return view('home-guest.tampilterbaru', compact('data', 'kategori'));
    }
    public function promoterbaru()
    {
        $promo = produk::where('status', 1)
            ->where('masapromo', '>', now())->get();
        return view('home-guest.homeguest', compact('promo'));
    }

    public function filter(Request $request)
    {
        $footer = setings::all();
        if(Auth::check()){
            $cari = $request->cari;
        $items = Kategori::all();
        $active = $request->kategori;
        $status = null;
        $data = null;
        $data = bookmark::where('user_id', Auth::user()->id)->get();
        $bookmark = bookmark::where('user_id', Auth::user()->id)->pluck('produk_id')->toarray();

        if ($request->pilihan === 'terbaru') {
            $status = 1;
            $month = Carbon::now()->month;
            $year = Carbon::now()->year;
            $query = Produk::where('status', $status)
                ->where('namapromo', 'LIKE', '%' . $cari . '%')
                ->whereMonth('masapromo', $month)
                ->whereYear('masapromo', $year)
                ->where('limit', '>', 0);
            if ($request->has('kategori')) {
                $kategori = $request->kategori;
                if (is_array($kategori)) {
                    $query->whereIn('kategoripromo', $kategori);
                } else {
                    $query->where('kategoripromo', $kategori);
                }
            }
            $data = $query->paginate(4);
        } elseif ($request->pilihan === 'terpopuler') {
            $status = 2;
            $query = Produk::where('status', 1)
                ->where('views', '>=', 5)
                ->where('namapromo', 'LIKE', '%' . $cari . '%')

                ->orderBy('views', 'desc');

            if ($request->has('kategori')) {
                $kategori = $request->kategori;
                if (is_array($kategori)) {
                    $query->whereIn('kategoripromo', $kategori);
                } else {
                    $query->where('kategoripromo', $kategori);
                }
            }
            $data = $query->paginate(4);
        } elseif ($request->pilihan === 'unggulan') {
            $status = 3;
            $query = Produk::where('status', 1)
                ->where('views', '>=', 100)
                ->where('namapromo', 'LIKE', '%' . $cari . '%')
                ->orderBy('views', 'desc');

            if ($request->has('kategori')) {
                $kategori = $request->kategori;
                if (is_array($kategori)) {
                    $query->whereIn('kategoripromo', $kategori);
                } else {
                    $query->where('kategoripromo', $kategori);
                }
            }
            $data = $query->paginate(4);
        } elseif ($request->pilihan === 'kilat') {
            $status = 4;
            $query = Produk::where('status', 1)
                ->where('namapromo', 'LIKE', '%' . $cari . '%')
                ->orderBy('views', 'desc')
                ->where('limit', '<=', 5)
                ->where('limit', '>', 0); //menambahkan pengkondisian limit > 0

            if ($request->has('kategori')) {
                $kategori = $request->kategori;
                if (is_array($kategori)) {
                    $query->whereIn('kategoripromo', $kategori);
                } else {
                    $query->where('kategoripromo', $kategori);
                }
            }
            $data = $query->paginate(4);
        } elseif ($request->has('kategori')) {
            $status = 5;
            $kategori = $request->kategori;
            if (is_array($kategori)) {
                $data = Produk::whereIn('kategoripromo', $kategori)
                    ->where('namapromo', 'LIKE', '%' . $cari . '%')
                    ->paginate(4);
            } else {
                $data = Produk::where('kategoripromo', $kategori)
                    ->where('namapromo', 'LIKE', '%' . $cari . '%')
                    ->paginate(4);
            }
        } else {
            $data = Produk::where('status', 1)
                ->where('namapromo', 'LIKE', '%' . $cari . '%')
                ->paginate(4);
        }

        $terbaruCount = Produk::where('status', 1)
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->count();

        $data->appends(['cari' => $cari, 'pilihan' => $request->pilihan, 'kategori' => $request->kategori]);

        return view('home-guest.filter', compact('data', 'status', 'items', 'active', 'terbaruCount', 'bookmark', 'footer'));
        } else {
            return redirect()->back()->with('error', 'Anda Harus Login Terlebih Dahulu' );
        }
        // return view('home-guest.filter', compact('data', 'items'));
    }

    public function notif($id)
    {
        $notifikasi = notifikasi::where('user_id', $id)->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $belumdibaca = count($notifikasi);
        return view('notifikasi.notiftolak', compact('notifikasi', 'belumdibaca'));
    }

    public function markAsRead(Request $request, $id)
{
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->read_at = now();
        $notifikasi->save();

        return redirect('editpromo/' . $id);

    }

}

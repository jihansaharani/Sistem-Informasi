<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\setings;
use App\Models\bookmark;
use App\Models\kategori;
use App\Models\promotor;
use App\Models\notifikasi;
use App\Models\fotoproduks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListProductController extends Controller
{
    public function promoaktif(Request $request)
    {
        $cari = $request->input('cari');
        // $data = produk::where('status', 1)->get();
        $data = produk::where('status', 1)
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->whereNull('pesan')
            ->paginate(4);
        // dd($data);

        $data->appends(['cari' => $cari]);

        return view('list.list-promo', compact('data'));
    }

    public function promopending(Request $request)
{
    $cari = $request->input('cari');
    $data = produk::where('status', 0)
        ->where('namapromo', 'LIKE', '%' . $cari . '%')
        ->whereNull('pesan')
        ->paginate(10);

    $data->appends(['cari' => $cari]);

    return view('list.promopending', compact('data'));
}


    public function detailpromo($id)
    {
        $data = produk::find($id);
        $kategori = kategori::find($data->kategoripromo);
        $promotor = promotor::where('user_id', $data->user_id)->first();
        $fotoproduk = fotoproduks::where('produk_id', $data->id)->get();
        // dd($data->user_id);
        return view('list.detailpromo', compact('data', 'kategori', 'promotor', 'fotoproduk'));
    }

    public function terimapromo($id)
    {
        $data = produk::where('id', $id)->update([
            'status' => 1,
        ]);
        return redirect('/promoaktif')->with('success', 'Promo Berhasi Diterima');
    }

    public function tolak(Request $request)
    {
        $cari = $request->input('cari');
        $data = produk::where('status', 2)
            ->where('namapromo', 'LIKE', '%' . $cari . '%')
            ->paginate(2);

        $data->appends(['cari' => $cari]);

        return view('list.promoditolak', compact('data'));
    }

    public function tolakpromo(Request $request, $id)
    {
        $data = produk::where('id', $id)->update([
            'status' => 2,
            'pesan' => $request->pesan,
        ]);
        $data = produk::find($id);
        $notiftolak = new notifikasi();
        $notiftolak->user_id = $data->user_id;
        $notiftolak->pesan = $request->pesan;
        $notiftolak->save();
        return redirect('/ditolak')->with('success', 'Promo Berhasi Ditolak');
    }

    public function hapuspromo($id)
    {
        $data = produk::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Promo Berhasi Dihapus');
    }

    public function promopendingtable(Request $request)
    {
        $data = produk::where('status', 'LIKE', '%' . $request->status . '%')->get();

        foreach ($data as $item) {
            $kategori = kategori::find($item->kategoripromo);
            $promotor = promotor::where('user_id', $item->user_id)->first();
            $fotoproduk = fotoproduks::where('produk_id', $item->id)->get();
            $item->kategoripromo = $kategori->kategori;
            $item->promotor = $promotor->namapromotor;
            $item->fotoproduk = $fotoproduk;
        }
        $status = $request->status;
        if($status == null){
            $status = 'all';
        }
        return view('PendingTolak.promopendingtable',[ 'data' => $data, 'request' => $status]);
    }

    public function diterimatabel(Request $request)
    {
        if ($request->has('myCheckbox')) {
            foreach ($request->myCheckbox as $item) {
                produk::find($item)->update([
                    'status' => 1,
                ]);
            }
            return redirect('/promopendingtable')->with('success', 'Promo Berhasil Diterima');
        } else {
            return redirect()->back()->with('error', 'Tidak ada promo yang dipilih');
        }
    }

    public function ditolaktabel(Request $request, $id){
        $data = produk::where('id', $id)->update([
            'status' => 2,
            'pesan' => $request->pesan,
        ]);
        $data = produk::find($id);
        $notiftolak = new notifikasi();
        $notiftolak->user_id = $data->user_id;
        $notiftolak->pesan = $request->pesan;
        $notiftolak->foto = $data->sampul;
        $notiftolak->namamerek = $data->namamerek;
        $notiftolak->save();
        return response()->json(['success' => 'Berhasil Menolak'],200);
    }

    public function bookmark($id)
    {
        if (Auth::check()) {
            $produk = bookmark::where('produk_id', $id)
                ->where('user_id', Auth::user()->id)->get();
            $produk1 = produk::find($id);
                $bookmark1 = new bookmark();
                $bookmark1->user_id = Auth::user()->id;
                $bookmark1->produk_id = $id;
                $bookmark1->bookmark = 1;
                $bookmark1->sampul = $produk1->sampul;
                $bookmark1->namapromo = $produk1->namapromo;
                $bookmark1->save();
                $message = 'Promo berhasil Disimpan';
            return redirect()->back()->with('success', $message);
        } else {
            return redirect()->back()->with('error', 'Anda Harus Login Terlebih Dahulu');
        }
    }


    public function unbookmark($produk_id)
    {
        $user_id = Auth::id();
        $bookmark = bookmark::where('user_id', $user_id)
            ->where('produk_id', $produk_id)
            ->first();
        // dd($produk_id);
        if (!$bookmark) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $produk = $bookmark->produk;
        $bookmark->delete();

        return redirect()->back()->with('success', 'Bookmark berhasil dihapus.');
    }

    public function disimpan(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $footer = setings::all();
        $data = bookmark::where('user_id', Auth::user()->id)->get();
        return view('home-guest.bookmark', ['data' =>$data, 'footer'=>$footer]);
    }

}

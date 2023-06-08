<?php

namespace App\Http\Controllers;

use App\Models\kilat;
use App\Models\produk;
use App\Models\setings;
use App\Models\kategori;
use App\Models\komentar;
use App\Models\fotoproduks;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeskripsiFotoController extends Controller
{
    public function deskripsifoto($id)
    {
        $footer = setings::all();
        $promo = produk::find($id);
        $fotoproduk = fotoproduks::where('produk_id', $promo->id)->get();
        // dd($fotoproduk);
        $kategori = kategori::where('id', $promo->id)->get();
        return view('homepromotor.deskripsifoto', compact('promo', 'fotoproduk', 'kategori','footer'));
    }

    public function detpromo($id)
    {
        $footer = setings::all();
        $data1 = kategori::all();

        $promo = produk::find($id);

        if (!$promo) {
            return redirect()->back()->with('error', 'Maaf Data Promo Tidak Tersedia');
        }

        $komentar = komentar::where('forum_id', $promo->id)->get();

        $fotoproduk = fotoproduks::where('produk_id', $promo->id)->get();

        $now = Carbon::now();

        $apa = produk::where('kategoripromo', $promo->kategoripromo)
            ->where('status', 1)
            ->whereDate('masapromo', '>=', $now)
            ->get();

        $promo->update([
            'views' => $promo->views + 1,
        ]);

        return view('home-guest.detpromo', compact('promo', 'fotoproduk', 'apa', 'data1', 'komentar', 'footer'));
    }

    public function gunakanpromo($id)
    {
        $promo = produk::find($id);
        $guest_id = Auth::user()->id;

        // check if promo has been used by this guest
        if (strpos($promo->used_by_guest, $guest_id) !== false) {
            return redirect()->route('detpromo', ['id' => $id])->with('error', 'Anda sudah menggunakan promo ini sebelumnya.');
        }

        // check if promo has reached its limit
        if ($promo->limit <= 0) {
            return redirect()->route('detpromo', ['id' => $id])->with('error', 'Promo ini sudah mencapai batas penggunaan.');
        }

        // update promo limit and add guest id to used_by_guest column
        $promo->update([
            'limit' => $promo->limit - 1,
            'used_by_guest' => $promo->used_by_guest ? $promo->used_by_guest . ',' . $guest_id : $guest_id,
        ]);

        return redirect()->route('detpromo', ['id' => $id])->with('success', 'Promo Berhasil Digunakan');
    }

    public function detkilat($id)
    {
        $promo = kilat::find($id);
        return view('home-guest.detpromo', compact('promo'));
    }

    public function detpopuler($id)
    {
        $data = produk::find($id);
        return view('home-guest.detpopuler', compact('data'));
    }

    public function detpromokilat($id)
    {
        $data = produk::find($id);
        $data->update([
            'views' => $data->views + 1,
        ]);
        return view('home-guest.detpromokilat', compact('data'));
    }
    public function komentar(Request $request)
{
    $validator = Validator::make($request->all(), [
        'konten' => [
            'required',
            'not_regex:/\b(kontol|memek|anjing|asu|kirek|jorok|jelek|kulit hitam)\b/i',
        ],
    ], [
        'konten.not_regex' => 'Maaf, kata-kata tersebut tidak diizinkan dalam komentar.',
    ]);

    if ($validator->fails()) {
        Toastr::error($validator->errors()->first(), 'Error');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    if (Auth()->check()) {
        $komentar = Komentar::create([
            'konten' => $request->konten,
            'name' => Auth()->user()->name,
            'user_id' => Auth()->user()->id,
            'forum_id' => $request->forum_id,
            'parent' => $request->parent,
        ]);

        return redirect()->back()->with('success', 'Anda Berhasil Mengirim Pesan ini');
    } else {
        return redirect()->back()->with('error', 'Anda harus login terlebih dahulu');
    }
}


    public function deletekomentar($id)
    {
        $komentar = Komentar::find($id);
        $komentar->delete();
        return redirect()->back()->with('success', 'Anda Berhasil Menghapus Pesan ini');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\produk;
use App\Models\setings;
use App\Models\kategori;
use App\Models\notifikasi;
use App\Models\fotoproduks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function listpromo(Request $request)
    {
        $footer = setings::all();
        $keyword = $request->cari;
        $data = produk::where('namapromo', 'LIKE', '%' . $request->cari . '%')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $notifikasi = notifikasi::where('user_id', Auth::id())->whereNull('read_at')->orderBy('created_at', 'desc')->get();
        $belumdibaca = count($notifikasi);

        $data->appends(['cari' => $keyword]);

        return view('homepromotor.homepromotor', compact('data','notifikasi','belumdibaca','footer'));
    }

    public function tambahpromo()
    {
        $data = kategori::all();
        $footer = setings::all();

        // $data = User::find($id);
        return view('homepromotor.tambahpromo', compact('data','footer'));
    }


    public function insertpromo(Request $request)
    {
        $this->validate($request, [
        'namapromo' => function ($attribute, $value, $fail) {
            if (strlen($value) > 50) {
                $fail('Nama Promo Tidak Boleh Melebihi 50 Karakter.');
            }
        },
        'kategoripromo' => 'required',
        'deskripsipromo' => 'required|', // Menambahkan validasi batasan karakter maksimal
        'masapromo' => 'required|date|after_or_equal:today',
        'limit' => 'required',
        'sampul' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'fotoproduk.*' => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ], [
        'namapromo.required' => 'Nama Promo Harus Diisi',
        'kategoripromo.required' => 'Kategori Promo Harus Diisi',
        'deskripsipromo.required' => 'Deskripsi Promo Harus Diisi',
         // Menambahkan pesan error untuk validasi batasan karakter
        'masapromo.required' => 'Masa Promo Harus Diisi',
        'masapromo.date' => 'Masa Promo Harus Berupa Tanggal',
        'masapromo.after_or_equal' => 'Masa Promo Harus Lebih Besar atau Sama Dengan Hari Ini',
        'limit.required' => 'Limit Promo Harus Diisi',
        'sampul.required' => 'Sampul Foto Harus Diisi',
        'sampul.image' => 'Sampul Foto Harus Berisi File Foto',
        'sampul.mimes' => 'Sampul Foto Harus Berupa Extensi jpg, png, jpeg',
        'sampul.max' => 'Sampul Foto Maksimal Berisi 2MB',
        'fotoproduk.*.required' => 'Foto Produk Harus Diisi',
        'fotoproduk.*' => 'Fot Produk Harus Berupa Image',
        'fotoproduk.*.mimes' => 'Foto Produk Harus Berupa ekstensi jpg, png, jpeg',
        'fotoproduk.*.max' => 'Foto Produk Maksimal Berukuran 2MB',
    ]);

        $user = Auth::user()->id;
        $promotor = Auth::user()->namamerek;
        $model = produk::create([
            'user_id' => $user,
            'namamerek' => $promotor,
            'namapromo' => $request->namapromo,
            'deskripsipromo' => $request->deskripsipromo,
            'kategoripromo' => $request->kategoripromo,
            'masapromo' => $request->masapromo,
            'limit' => $request->limit,
            'sampul' => $request->file('sampul')->getClientOriginalName(),
            'status' => $request->status,
        ]);

        $nomer = 1;
        foreach ($request->fotoproduk as $fotoproduk) {
            $filename = hash('sha256', time()) . '.' . $nomer . $fotoproduk->getClientOriginalExtension();
            $path = $fotoproduk->store('fotoproduk');
            $fotoproduk->move('fotopromo/', $filename);
            $fotoproduk = fotoproduks::create([
                'produk_id' => $model->id,
                'fotoproduk' => $filename,
            ]);
            $nomer++;
        }

        $request->file('sampul')->move('sampul/', $request->file('sampul')->getClientOriginalName());
        return redirect('berandapromotor')->with('success', 'Promo Berhasil Ditambahkan');
    }

    public function tampilpromo($id)
    {
        $data1 = kategori::all();
        $footer = setings::all();
        $data = produk::findorfail($id);
        // dd($data);
        $fotoproduk = fotoproduks::where('produk_id', $data->id)->get();
        return view('homepromotor.editpromo', compact('data', 'data1', 'fotoproduk','footer'));
    }

    public function editpromo(Request $request, $id)
    {
        $this->validate($request, [
            'namapromo' => function ($attribute, $value, $fail) {
                if (strlen($value) > 50) {
                    $fail('Nama Promo Tidak Boleh Melebihi 50 Karakter.');
                }
            },
            'masapromo' => 'required|date|after_or_equal:today',
            'deskripsipromo' => 'required',
            'sampul' => 'image|mimes:jpg,png,jpeg|max:2048',

        ], [
            'sampul.image' => 'Sampul Foto Harus Berisi File Foto',
            'sampul.mimes' => 'Sampul Foto Harus Berupa Extensi jpg, png, jpeg',
            'sampul.max' => 'Sampul Foto Maksimal Berisi 2MB',
            'masapromo.required' => 'Masa Promo Harus Diisi',
        'masapromo.date' => 'Masa Promo Harus Berupa Tanggal',
        'masapromo.after_or_equal' => 'Masa Promo Harus Lebih Besar atau Sama Dengan Hari Ini',


        ]);
        $data = produk::find($id);
        $data->pesan=null;
        $data->update($request->all());

        if ($request->has('fotoproduk')) {
            foreach ($request->fotoproduk as $fotoproduk) {
                $new_foto = new fotoproduks;
                $new_foto->produk_id = $data->id;
                $new_foto->fotoproduk = $fotoproduk->getClientOriginalName();
                $new_foto->save();
            }
        }

        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('sampul/', $filename);
            $data->sampul = $filename;
        }

        $data->save();
        return redirect('berandapromotor')->with('success', 'Promo Berhasil Update');
    }

    public function deletepromo($id)
    {
        $data = produk::find($id);
        $data->delete();
        return redirect('berandapromotor');
    }

    // Edit, Tambah dan Hapus FotoProduk
    public function editfotoproduk(Request $request, $id)
    {
        $this->validate($request, [
            'fotoproduk' => 'image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'fotoproduk.image' => 'Foto Produk harus berisi File Foto',
            'fotoproduk.mimes' => 'Foto Produk harus berupa ekstensi jpg, png, jpeg',
            'fotoproduk.max' => 'Foto Produk maksimal berukuran 2MB',
        ]);

        $data = fotoproduks::findOrFail($id);

        if ($request->hasFile('fotoproduk')) {
            $file = $request->file('fotoproduk');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;
            $file->move('fotopromo/', $filename);
            if (file_exists(public_path('fotopromo/' . $data->fotoproduk))) {
                unlink(public_path('fotopromo/' . $data->fotoproduk));
            }
            $data->update([
                'fotoproduk' => $filename,
            ]);
        }

        return redirect()->back()->with('success', 'Foto Produk anda sudah diupdate.');
    }

    public function deletefotoproduk($id)
    {
        $data = fotoproduks::find($id);
        $data->delete();
        unlink(public_path('fotopromo/' . $data->fotoproduk));
        return redirect()->back()->with('success', 'Foto Produk anda sudah Dihapus.');
    }

    public function insertfotoproduk(Request $request)
    {
        $this->validate($request, [
            'fotoproduk' => 'image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'fotoproduk.image' => 'Foto Produk harus berisi File Foto',
            'fotoproduk.mimes' => 'Foto Produk harus berupa ekstensi jpg, png, jpeg',
            'fotoproduk.max' => 'Foto Produk maksimal berukuran 2MB',
        ]);

        $data = fotoproduks::create([
            'produk_id' => $request->id,
            'fotoproduk' => $request->fotoproduk,
        ]);

        if ($request->hasFile('fotoproduk')) {
            $file = $request->file('fotoproduk');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('sha256', time() . $file->getClientOriginalName()) . '.' . $extension;
            $file->move('fotopromo/', $filename);
            $data->update([
                'fotoproduk' => $filename,
                'produk_id' => $request->id,
            ]);
        }

        return redirect()->back()->with('success', 'Foto produk sudah diunggah.');
    }

}

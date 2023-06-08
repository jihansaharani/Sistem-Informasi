<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetingsController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PromotorController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\ProdukSimpleController;
use App\Http\Controllers\DeskripsiFotoController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
//loginadmin

// Route::get('/home', [LoginController::class, 'home'])->name('home');
Route::get('/profiladmin', [AdminController::class, 'profiladmin'])->name('profiladmin');
Route::post('/updateprofileadmin/{id}', [AdminController::class, 'updateprofileadmin'])->name('updateprofileadmin');
// Route::get('/loginadmin',[AdminController::class, 'loginadmin']) -> name('loginadmin');
// Route::post('/loginadminproses',[AdminController::class, 'loginadminproses']) -> name('loginadminproses');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/tabel-grafik', function () {
    return view('grafik.tabel-grafik');
});

Route::get('/produk', function () {
    return view('produk.produk');
});

//loginPromotor

Route::get('/SyaratDanKetentuan',[LoginController::class, 'syaratdanketentuan']);
Route::get('/registerGuest', [LoginController::class, 'registerGuest']);
Route::post('/registerPengunjung', [LoginController::class, 'registerPengunjung']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    $user = $request->user();
    if ($user->role === 'guest') {
        return redirect('/login')->with('success', 'Akun Anda Sudah DiVerifikasi Silahkan Login');
    }else{
        return redirect('/login')->with('success', 'Akun Anda Sudah DiVerifikasi Silahkan Login');
    }
    })->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registerUser', [LoginController::class, 'registerUser'])->name('registerUser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/lupapassword', [ForgotPasswordController::class, 'create'])->name('password.create');
Route::post('/lupapassword', [ForgotPasswordController::class, 'store'])->name('password.store');

Route::get('/mengaturulangpassword{token}', [ForgotPasswordController::class, 'reset'])->name('password.reset');
Route::post('/mengaturulangpassword', [ForgotPasswordController::class, 'rapli'])->name('password.sendreset');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/updateprofile/{id}', [ProfileController::class, 'updateprofile']);
Route::get('/gantipassword', [ProfileController::class, 'gantipassword']);
Route::post('/updatepaswordpromotor', [ProfileController::class, 'updatepasswordpromotor']);
//berandapromotor

// Route::get('/search', 'ProdukSimpleController@index')->name('search');

//HomeGuest
Route::get('/', [GuestController::class, 'homeguest'])->name('homeguest');
Route::middleware(['auth:sanctum', 'verified', 'GuestMiddleware'])->group(function () {
});

Route::get('/promotopuler/{id}', [GuestController::class, 'promoterpopuler']);
Route::get('/detailbrand/{brand}/{id}', [GuestController::class, 'detailbrand']);
Route::get('/daftarklaim', [GuestController::class, 'daftarklaim'])->name('daftarklaim');

//detailproduk
Route::get('/produksimple/{kategori}/{id}', [ProdukSimpleController::class, 'detailkategori'])->name('detailkategori');
Route::get('/filter', [ProdukSimpleController::class, 'filter'])->name('filter');
Route::get('/tampilpopuler', [ProdukSimpleController::class, 'tampilpopuler'])->name('tampilpopuler');
Route::get('/tampilterbaru', [ProdukSimpleController::class, 'tampilterbaru'])->name('promoterbaru');

//kontak
Route::get('/kontak', [GuestController::class, 'kontak']);
Route::post('/storepesan', [PesanController::class, 'storepesan']);
Route::get('/faq', [GuestController::class, 'faq']);
Route::get('/tentangkami', [GuestController::class, 'tentangkami']);
Route::get('homeguest', [GuestController::class, 'homeguest'])->name('homeguest');

// Bookmark
Route::post('/bookmark/{id}/', [ListProductController::class, 'bookmark'])->name('bookmark');
Route::post('/unbookmark/{id}/', [ListProductController::class, 'unbookmark'])->name('unbookmark');
Route::get('/disimpan', [ListProductController::class, 'disimpan'])->name('disimpan');

// Middleware Promotor
Route::middleware(['auth:sanctum', 'verified', 'PromotorMiddleware'])->group(function () {
    Route::get('/berandapromotor', [ProdukController::class, 'listpromo'])->name('listpromo');

    //promotor menambahkan promo
    // Route::get('/berandapromotor', [ProdukController::class, 'listpromo'])->name('listpromo');
    Route::post('/insertpromo', [ProdukController::class, 'insertpromo'])->name('insertpromo');
    Route::get('/tambahpromo', [ProdukController::class, 'tambahpromo'])->name('tambahpromo');
    Route::get('/editpromo/{id}', [ProdukController::class, 'tampilpromo'])->name('editpromo');
    Route::post('/updatepromo/{id}', [ProdukController::class, 'editpromo'])->name('editpromo');
    Route::get('/deletepromo/{id}', [ProdukController::class, 'deletepromo'])->name('deletepromo');

    //daftarpromo
    Route::get('/promopending', [PendingController::class, 'pending'])->name('promopending');
    Route::get('/limitexpired', [PendingController::class, 'limitexpired'])->name('limitexpired');
    Route::get('/promoditerima', [PendingController::class, 'diterima'])->name('promoditerima');
    Route::get('/promoditolak', [PendingController::class, 'ditolak'])->name('promoditolak');
    Route::get('/promoexpired', [PendingController::class, 'promoexpired'])->name('promoexpired');

    // Edit Gambar Modal
    Route::put('/editfotoproduk/{id}', [ProdukController::class, 'editfotoproduk'])->name('editfotoproduk');
    // Hapus Gambar
    Route::get('/deletefotoproduk/{id}', [ProdukController::class, 'deletefotoproduk'])->name('deletefotoproduk');
    // Tambah Gambar
    Route::post('/insertfotoproduk', [ProdukController::class, 'insertfotoproduk'])->name('insertfotoproduk');

    Route::get('/deskripsifoto/{id}', [DeskripsiFotoController::class, 'deskripsifoto'])->name('deskripsifoto');

    Route::get('/notif/{notification_id}', [ProdukSimpleController::class, 'notif'])->name('notif');
    Route::put('/notifikasi/{id}/read', [ProdukSimpleController::class, 'markAsRead'])->name('notifikasi.markAsRead');

});

// Middleware Admin
Route::middleware(['auth:sanctum', 'AdminMiddleware'])->group(function () {
    Route::get('/beranda', [AdminController::class, 'beranda'])->name('admin');

    //adminapproval
    Route::get('/promoaktif', [ListProductController::class, 'promoaktif'])->name('promoaktif');
    Route::get('/promopendingpromotor', [ListProductController::class, 'promopending'])->name('promopending');
    Route::get('/ditolak', [ListProductController::class, 'tolak'])->name('ditolak');
    Route::get('/detailpromopromotor/{id}', [ListProductController::class, 'detailpromo'])->name('detailpromo');
    Route::post('/promoditerima/{id}', [ListProductController::class, 'terimapromo'])->name('terimapromo');
    Route::put('/promoditolak/{id}', [ListProductController::class, 'tolakpromo'])->name('tolakpromo');

    Route::get('/websitesetings',[SetingsController::class, 'setingwebsite'])->name('setingwebsite');

    Route::get('/editwebsite/{id}',[SetingsController::class, 'editwebsite'])->name('editwebsite');
    Route::put('/updatewebsite/{id}', [SetingsController::class, 'updatewebsite'])->name('updatewebsite');

    Route::get('/detailwebsite/{id}', [SetingsController::class, 'detailwebsite'])->name('detailwebsite');

    //Tabel Kategori
    //read
    Route::get('/tabelkategori', [KategoriController::class, 'tabelkategori'])->name('tabel.kategori');
    //create
    Route::get('/tambahkategori', [KategoriController::class, 'tambahkategori'])->name('tambah.kategori');
    Route::post('/storekategori', [KategoriController::class, 'storekategori'])->name('store.kategori');
    //update
    Route::get('/editkategori/{id}', [KategoriController::class, 'editkategori'])->name('edit.kategori');
    Route::put('/updatekategori/{id}', [KategoriController::class, 'updatekategori'])->name('updatekategori');
    //delete
    Route::get('/hapuskategori/{id}', [KategoriController::class, 'hapuskategori'])->name('hapus.kategori');

    //Tabel Promotor
    Route::get('/tabelpromotor', [PromotorController::class, 'tabelpromotor'])->name('tabelpromotor');
    Route::get('/hapuspromotor/{id}', [PromotorController::class, 'hapuspromotor'])->name('hapuspromotor');
    Route::get('/tabelguest', [PromotorController::class, 'tabelguest'])->name('tabelguest');
    Route::get('/hapusguest/{id}', [PromotorController::class, 'hapusguest'])->name('hapusguest');

    //Tabel Banner
//read
    Route::get('/tabelbanner', [BannerController::class, 'tabelbanner'])->name('tabel.banner');
//create
    Route::get('/tambahbanner/{id}', [BannerController::class, 'tambahbanner'])->name('tambah.banner');
//update
    Route::get('/editbanner/{id}', [BannerController::class, 'editbanner'])->name('edit.banner');
    Route::put('/updatebanner/{id}', [BannerController::class, 'updatebanner'])->name('updatebanner');

    //Tabel List Promo Pending
    Route::get('/promopendingtable',[ListProductController::class,'promopendingtable'])->name('promopendingtable');
    Route::post('/diterimatabel',[ListProductController::class,'diterimatabel'])->name('diterimatabel');
    Route::post('/ditolaktabel/{id}',[ListProductController::class,'ditolaktabel'])->name('ditolaktabel');
    Route::get('/filterpending',[ListProductController::class,'filterpending'])->name('filterpending');

    Route::get('/syarat',[SkController::class, 'syarat'])->name('syarat');
    Route::get('/editsyarat/{id}',[SkController::class, 'editsyarat'])->name('editsyarat');
    Route::put('/updatesyarat/{id}',[SkController::class, 'updatesyarat'])->name('updatesyarat');
});

Route::get('/detpromo/{id}', [DeskripsiFotoController::class, 'detpromo'])->name('detpromo');
Route::post('/komentar/{id}', [DeskripsiFotoController::class, 'komentar'])->name('komentar');
Route::get('/deletekomentar/{id}', [DeskripsiFotoController::class, 'deletekomentar'])->name('deletekomentar');
Route::post('/gunakanpromo/{id}', [DeskripsiFotoController::class, 'gunakanpromo']);



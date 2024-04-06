<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\CrudHadiahController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WebUndanganController;
use App\Http\Controllers\CrudTamuController;
use App\Http\Controllers\CrudAudioController;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\SetupUserUtama;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    if (auth()->check()) {
        // Jika pengguna sudah login
        if (auth()->user()->role === 'admin') {
            // Jika pengguna adalah admin, alihkan ke halaman admin
            return redirect('/admin');
        } else {
            // Jika pengguna adalah user biasa, alihkan ke halaman beranda
            return redirect('/beranda');
        }
    }
    // Jika belum login, tampilkan halaman one
    return view('one');
})->name('lp');

Route::get('/mulai', function () {
    return view('user.setup_acara');
});

Route::get('/demo/{id}', [WebUndanganController::class, 'index'])->name('demonstrasi');
Route::get('/play/{id}', [WebUndanganController::class, 'play']);
Route::get('/play/{id}/{id_tamu}', [WebUndanganController::class, 'play_tamu']);
Route::post('/play/post', [WebUndanganController::class, 'postComment'])->name('postComment');

// hanya bisa diakses user
Auth::routes();
Route::group(['middleware' => 'user'], function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::resource('/setup', SetupUserUtama::class)->except(['publish']);
    Route::post('/setup/publish/{id}', [SetupUserUtama::class, 'publish'])->name('setup.publish');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::post('/profil', [ProfileController::class, 'store'])->name('upload.profile.image');
    //Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/tambah', [HomeController::class, 'tambah'])->name('tambah');
    Route::get('/tambah/edit/{id}', [WebUndanganController::class, 'create']);
    Route::get('/tautan', [HomeController::class, 'tautan'])->name('tautan');
    Route::get('/ucapan', [HomeController::class, 'ucapan'])->name('ucapan');
    Route::get('/ucapan/hapus/{id}', [HomeController::class, 'ucapan_hapus']);

    Route::get('/tamu', [CrudTamuController::class, 'index'])->name('tamu.index');
    Route::get('/tamu/tambah', [CrudTamuController::class, 'tambah'])->name('tamu.tambah');
    Route::post('/tamu/store', [CrudTamuController::class, 'store'])->name('tamu.store');
    Route::get('/tamu/edit/{id}', [CrudTamuController::class, 'edit'])->name('tamu.edit');
    Route::put('/tamu/update/{id}', [CrudTamuController::class, 'update'])->name('tamu.update');
    Route::get('/tamu/hapus/{id}', [CrudTamuController::class, 'delete'])->name('tamu.delete');
    Route::get('/tamu/getUserDataByName/{name}', [CrudTamuController::class, 'getUserDataByName']);

    Route::get('/hadiah', [CrudHadiahController::class, 'index'])->name('hadiah.index');
    Route::post('/hadiah/store', [CrudHadiahController::class, 'store'])->name('hadiah.store');
    Route::put('/hadiah/update/{id}', [CrudHadiahController::class, 'update'])->name('hadiah.update');
    Route::get('/hadiah/hapus/{id}', [CrudHadiahController::class, 'hapus'])->name('hadiah.delete');
    
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/proses', [PembayaranController::class, 'create'])->name('pembayaran.proses');
    Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('/pembayaran/update/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::get('/pembayaran/hapus/{id}', [PembayaranController::class, 'delete'])->name('pembayaran.delete');
    Route::get('/beli/{templateId}', [PembayaranController::class, 'beliTemplate'])->name('pembayaran.beli');
});



// hanya bisa diakses admin
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::resource('pengaturan', AdminSettingController::class)->names([
        'index' => 'admin.pengaturan.index',
        'create' => 'admin.pengaturan.create',
        'store' => 'admin.pengaturan.store',
        'show' => 'admin.pengaturan.show',
        'edit' => 'admin.pengaturan.edit',
        'destroy' => 'admin.pengaturan.destroy',
    ])->except(['update']);

    Route::patch('/pengaturan', [AdminSettingController::class, 'update'])->name('admin.pengaturan.update');

    Route::resource('pengguna', CrudUserController::class);
    Route::get('/pengguna', [CrudUserController::class, 'index'])->name('cruduser.index');
    Route::get('/pengguna/tambah', [CrudUserController::class, 'tambah'])->name('cruduser.tambah');
    Route::post('/pengguna/store', [CrudUserController::class, 'store'])->name('cruduser.store');
    Route::get('/pengguna/edit/{id}', [CrudUserController::class, 'edit'])->name('cruduser.edit');
    Route::put('/pengguna/update/{id}', [CrudUserController::class, 'update'])->name('cruduser.update');
    Route::get('/pengguna/hapus/{id}', [CrudUserController::class, 'delete'])->name('cruduser.delete');

    Route::get('/audio', [CrudAudioController::class, 'index'])->name('audio.index');
    Route::post('/audio/store', [CrudAudioController::class, 'store'])->name('audio.store');
    Route::put('/audio/update/{id}', [CrudAudioController::class, 'update'])->name('audio.update');
    Route::get('/audio/hapus/{id}', [CrudAudioController::class, 'hapus'])->name('audio.delete');

    Route::resource('template', TemplateController::class);
    Route::get('/transaksi', [PembayaranController::class, 'transaksi'])->name('transaksi');
    Route::post('/transaksi', [PembayaranController::class, 'transaksi_proses'])->name('transaksi.konfirmasi');
});

// bisa diakses siapa saja
Route::middleware('auth')->group(function () {
    
});

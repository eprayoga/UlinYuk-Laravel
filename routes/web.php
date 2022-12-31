<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Detail;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\AdminDataTravel;
use App\Http\Livewire\Admin\AdminDataKategori;

use App\Http\Livewire\Agen\AgenDashboard;
use App\Http\Livewire\Agen\AgenDeskripsiTravel;
use App\Http\Livewire\Agen\AgenGaleriTravel;
use App\Http\Livewire\Agen\AgenTiketTravel;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class)->name('/');
Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');

Route::group(['prefix' => 'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::group(['middleware'=>['role:admin']], function() {
        Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard')->middleware('auth:admin');

        Route::get('/admin/data-travel', AdminDataTravel::class)->name('admin.data.travel')->middleware('auth:admin');
        Route::get('/admin/data-travel/create', [AdminDataTravel::class, 'create'])->name('admin.data.travel.create')->middleware('auth:admin');
        Route::post('/admin/data-travel/store', [AdminDataTravel::class, 'store'])->name('admin.data.travel.store')->middleware('auth:admin');
        Route::get('/admin/data-travel/edit/{id}', [AdminDataTravel::class, 'edit'])->name('admin.data.travel.edit')->middleware('auth:admin');
        Route::post('/admin/data-travel/edit/{id}', [AdminDataTravel::class, 'update'])->name('admin.data.travel.update')->middleware('auth:admin');
        Route::delete('/admin/data-travel/delete/{id}', [AdminDataTravel::class, 'destroy'])->name('admin.data.travel.delete')->middleware('auth:admin');

        Route::get('/admin/data-kategori', AdminDataKategori::class)->name('admin.data.kategori')->middleware('auth:admin');
        Route::get('/admin/data-kategori/create', [AdminDataKategori::class, 'create'])->name('admin.data.kategori.create')->middleware('auth:admin');
        Route::post('/admin/data-kategori/store', [AdminDataKategori::class, 'store'])->name('admin.data.kategori.store')->middleware('auth:admin');
        Route::get('/admin/data-kategori/edit/{id}', [AdminDataKategori::class, 'edit'])->name('admin.data.kategori.edit')->middleware('auth:admin');
        Route::post('/admin/data-kategori/edit/{id}', [AdminDataKategori::class, 'update'])->name('admin.data.kategori.update')->middleware('auth:admin');
        Route::delete('/admin/data-kategori/delete/{id}', [AdminDataKategori::class, 'destroy'])->name('admin.data.kategori.delete')->middleware('auth:admin');
    });

    Route::group(['middleware'=>['role:agen']], function() {
        Route::get('/agen/dashboard', AgenDashboard::class)->name('agen.dashboard')->middleware('auth:admin');

        Route::get('/agen/deskripsi-travel', AgenDeskripsiTravel::class)->name('agen.deskripsi.travel')->middleware('auth:admin');
        Route::post('/agen/deskripsi-travel', [AgenDeskripsiTravel::class, 'update'])->name('agen.deskripsi.travel.update')->middleware('auth:admin');

        Route::get('/agen/galeri-travel', AgenGaleriTravel::class)->name('agen.galeri.travel')->middleware('auth:admin');
        Route::get('/agen/galeri-travel/add', [AgenGaleriTravel::class, 'add'])->name('agen.galeri.travel.create')->middleware('auth:admin');
        Route::post('/agen/galeri-travel/add', [AgenGaleriTravel::class, 'store'])->name('agen.galeri.travel.store')->middleware('auth:admin');
        Route::delete('/agen/galeri-travel/delete/{id}', [AgenGaleriTravel::class, 'destroy'])->name('agen.galeri.travel.delete')->middleware('auth:admin');

        Route::get('/agen/tiket-travel', AgenTiketTravel::class)->name('agen.tiket.travel')->middleware('auth:admin');
        Route::get('/agen/tiket-travel/create', [AgenTiketTravel::class, 'create'])->name('agen.tiket.travel.create')->middleware('auth:admin');
        Route::post('/agen/tiket-travel/create', [AgenTiketTravel::class, 'store'])->name('agen.tiket.travel.post')->middleware('auth:admin');
        Route::get('/agen/tiket-travel/edit/{id}', [AgenTiketTravel::class, 'edit'])->name('agen.tiket.travel.edit')->middleware('auth:admin');
        Route::post('/agen/tiket-travel/edit/{id}', [AgenTiketTravel::class, 'update'])->name('agen.tiket.travel.update')->middleware('auth:admin');
        Route::delete('/agen/tiket-travel/delete/{id}', [AgenTiketTravel::class, 'destroy'])->name('agen.tiket.travel.delete')->middleware('auth:admin');
    });
});

Route::middleware([
    'auth:sanctum,web',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

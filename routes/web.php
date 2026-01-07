<?php

use App\Http\Controllers\Teller\RekeningController;
use App\Http\Controllers\Admin\CustomerService;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\Anggota\AnggotaController;
use App\Http\Controllers\auth\AccountController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionBank;
use App\Http\Controllers\Teller\PegadaianController;
use App\Http\Controllers\Teller\PembayaranPegadaianController;
use App\Http\Controllers\Teller\PembayaranPinjamanController;
use App\Http\Controllers\Teller\PinjamanController;
use App\Http\Controllers\Teller\TabunganController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'login'])->name('login.create');
    // Route::get('/register', [SessionController::class, 'register'])->name('register');
    // Route::post('/register', [SessionController::class, 'regist'])->name('register.create');
});

// bagian email verification
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::post('email/resend/{token}', [SessionController::class, 'resendEmail'])->name('verification.resend');

    Route::post('email/verify/{token}', [SessionController::class, 'verifyEmail'])->name('verification.verify');
});

// bagian logout dan dashboard
Route::middleware(['auth', 'verified', 'role:admin,operator,teller,anggota', 'aktif'])->group(function () {
    // logout
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
    // ktp akses & API
    Route::get('/ktp/{ktp}', [RekeningController::class, 'ktp'])->name('ktp');
    Route::get('/rekening/api/{rekening}', [RekeningController::class, 'rekeningAPI'])->name('rekening.api');
    Route::get('/user/api/{token}', [AccountController::class, 'UserAPI'])->name('user.api');

    // akun
    Route::get('/settings', [DashboardController::class, 'settings']);
    Route::patch('/settings', [DashboardController::class, 'settings_update'])->name('settings.update');
});

Route::middleware(['auth', 'verified', 'role:anggota', 'aktif'])->group(function () {
    Route::get('/anggota/dashboard', [DashboardController::class, 'anggota'])->name('anggota.dashboard');

    // rekap
    Route::get('tabungan/rekap', [AnggotaController::class, 'rekapTabungan'])->name('tabungan.rekap');
    Route::get('pinjaman/rekap', [AnggotaController::class, 'rekapPinjaman'])->name('pinjaman.rekap');
    Route::get('pegadaian/rekap', [AnggotaController::class, 'rekapPegadaian'])->name('pegadaian.rekap');
});
Route::middleware(['auth', 'verified', 'role:admin', 'aktif'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    Route::get('/session-bank/{bank}', [SessionBank::class, 'index'])->name('session-bank.index');
});
Route::middleware(['auth', 'verified', 'role:operator', 'aktif'])->group(function () {
    Route::get('/operator/dashboard', [DashboardController::class, 'admin'])->name('operator.dashboard');
});

Route::middleware(['auth', 'verified', 'role:admin,operator,teller', 'aktif'])->group(function () {
    // bagian rekening
    Route::get('/rekening', [RekeningController::class, 'index'])->name('rekening.index');

    // bagian tabungan
    Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan.index');
    Route::patch('/tabungan/{tabungan}', [TabunganController::class, 'update'])->name('tabungan.update');

    // bagian pinjaman
    Route::get('/pinjaman', [PinjamanController::class, 'index'])->name('pinjaman.index');

    // bagian pembayaran pinjaman
    Route::get('/pembayaran/pinjaman/{pinjaman}', [PembayaranPinjamanController::class, 'index'])->name('pembayaran-pinjaman.index');
    Route::get('/pembayaran/pinjaman/{pembayaran}/show', [PembayaranPinjamanController::class, 'show'])->name('pembayaran-pinjaman.show');
    Route::patch('/pembayaran/pinjaman/{pembayaran}', [PembayaranPinjamanController::class, 'update'])->name('pembayaran-pinjaman.update');

    // bagian pegadaian
    Route::get('/pegadaian', [PegadaianController::class, 'index'])->name('pegadaian.index');

    // bagian pembayaran pegadaian
    Route::get('/pembayaran/pegadaian/{pegadaian}', [PembayaranPegadaianController::class, 'index'])->name('pembayaran-pegadaian.index');
    Route::get('/pembayaran/pegadaian/{pembayaran}/show', [PembayaranPegadaianController::class, 'show'])->name('pembayaran-pegadaian.show');
    Route::patch('/pembayaran/pegadaian/{pembayaran}', [PembayaranPegadaianController::class, 'update'])->name('pembayaran-pegadaian.update');
});

Route::middleware(['auth', 'verified', 'role:admin,operator', 'aktif'])->group(function () {
    // bagian kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // bagian profile cabang
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/{profile}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // bagian customer service (akun)
    Route::get('/customer-service', [CustomerService::class, 'index'])->name('customer-service.index');
    Route::get('/customer-service/create', [CustomerService::class, 'create'])->name('customer-service.create');
    Route::post('/customer-service', [CustomerService::class, 'store'])->name('customer-service.store');
    Route::get('/customer-service/{customer_service}', [CustomerService::class, 'show'])->name('customer-service.show');
    Route::get('/customer-service/{customer_service}/edit', [CustomerService::class, 'edit'])->name('customer-service.edit');
    Route::patch('/customer-service/{customer_service}', [CustomerService::class, 'update'])->name('customer-service.update');
    Route::delete('/customer-service/{customer_service}', [CustomerService::class, 'destroy'])->name('customer-service.destroy');

    // bagian suspend dan unsuspend akun CS
    Route::patch('/suspend/{suspend}', [AccountController::class, 'suspend'])->name('suspend');
    Route::patch('/unsuspend/{unsuspend}', [AccountController::class, 'unsuspend'])->name('unsuspend');

    // bagian rekening
    Route::delete('/rekening/{rekening}', [RekeningController::class, 'destroy'])->name('rekening.destroy');

    // bagian tabungan
    Route::delete('/tabungan/{tabungan}', [TabunganController::class, 'destroy'])->name('tabungan.destroy');

    // bagian pinjaman
    Route::delete('/pinjaman/{pinjaman}', [PinjamanController::class, 'destroy'])->name('pinjaman.destroy');

    // bagian pembayaran pinjaman
    Route::delete('/pembayaran/pinjaman/{pembayaran}', [PembayaranPinjamanController::class, 'destroy'])->name('pembayaran-pinjaman.destroy');

    // bagian pegadaian
    Route::delete('/pegadaian/{pegadaian}', [PegadaianController::class, 'destroy'])->name('pegadaian.destroy');

    // bagian pembayaran pegadaian
    Route::delete('/pembayaran/pegadaian/{pembayaran}', [PembayaranPegadaianController::class, 'destroy'])->name('pembayaran-pegadaian.destroy');

    // bagian laporan
    Route::get('/tabungan/laporan', [LaporanController::class, 'tabungan'])->name('tabungan.laporan');
    Route::get('/pinjaman/laporan', [LaporanController::class, 'pinjaman'])->name('pinjaman.laporan');
    Route::get('/pegadaian/laporan', [LaporanController::class, 'pegadaian'])->name('pegadaian.laporan');
});

Route::middleware(['auth', 'verified', 'role:admin,teller', 'aktif'])->group(function () {
    // bagian dashboard
    Route::get('/teller/dashboard', [DashboardController::class, 'teller'])->name('teller.dashboard');

    // bagian rekening
    Route::get('/rekening/create', [RekeningController::class, 'create'])->name('rekening.create');
    Route::post('/rekening', [RekeningController::class, 'store'])->name('rekening.store');
    Route::get('/rekening/{rekening}', [RekeningController::class, 'show'])->name('rekening.show');
    Route::get('/rekening/{rekening}/edit', [RekeningController::class, 'edit'])->name('rekening.edit');
    Route::patch('/rekening/{rekening}', [RekeningController::class, 'update'])->name('rekening.update');
    Route::get('/rekening/{rekening}/cetak', [RekeningController::class, 'cetak'])->name('rekening.cetak');

    // bagian tabungan
    Route::post('/tabungan', [TabunganController::class, 'store'])->name('tabungan.store');
    Route::get('/tabungan/{tabungan}', [TabunganController::class, 'show'])->name('tabungan.show');
    Route::get('/tabungan/{rekening}/cetak', [TabunganController::class, 'cetak'])->name('tabungan.cetak');
    // Route::post('/tabungan/cetak-pdf', [TabunganController::class, 'cetakPdf']);
    Route::post('/tabungan/cetak-pdf/{rekening}', [TabunganController::class, 'cetakPdf'])->name('tabungan.cetak.pdf');
    Route::get('/rkpkntl', [TabunganController::class, 'rekap_tabungan'])->name('tabungan.rekap-semua');

    // bagian pinjaman
    Route::post('/pinjaman', [PinjamanController::class, 'store'])->name('pinjaman.store');
    Route::get('/pinjaman/{pinjaman}', [PinjamanController::class, 'show'])->name('pinjaman.show');
    Route::patch('/pinjaman/{pinjaman}', [PinjamanController::class, 'update'])->name('pinjaman.update');

    // bagian pembayaran pinjaman
    Route::post('/pembayaran/pinjaman/{pinjaman}', [PembayaranPinjamanController::class, 'store'])->name('pembayaran-pinjaman.store');

    // bagian pegadaian
    Route::post('/pegadaian', [PegadaianController::class, 'store'])->name('pegadaian.store');
    Route::get('/pegadaian/{pegadaian}', [PegadaianController::class, 'show'])->name('pegadaian.show');
    Route::patch('/pegadaian/{pegadaian}', [PegadaianController::class, 'update'])->name('pegadaian.update');

    // bagian pembayaran pegadaian
    Route::post('/pembayaran/pegadaian/{pegadaian}', [PembayaranPegadaianController::class, 'store'])->name('pembayaran-pegadaian.store');
});

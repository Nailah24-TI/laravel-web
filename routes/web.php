<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/pcr', function () {
//     return 'Selamat datang di Website Kampus PCR !';
// });
// Route::get('/mahasiswa', function () {
//     return 'Halo Mahasiswa';
// });
// Route::get('/nama/{param1}', function ($param1) {
//     return 'Nama Saya : ' . $param1;
// });
// Route::get('/nim/{param1}', function ($param1 = '') {
//     return 'nim Saya : ' . $param1;
// });
// Route::get('/nim/{param1}', function ($param1 = '') {
//     return 'nim Saya : ' . $param1;
// });
// Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

// // Route::get('/matakuliah/show/{param1?}', [MatakuliahController::class, 'show']);
// // Route::get('/matakuliah/show/{param1?}', function ($param1 = '') {
// //     return view('halaman-st445');
// // });

// Route::get('/matakuliah/{param1?}', [MatakuliahController::class, 'show']);

// Route::get('/matakuliah/index/{param1}', [MatakuliahController::class, 'index']);
// Route::get('/matakuliah/edit/{param1}', [MatakuliahController::class, 'edit']);
// Route::get('/matakuliah/hapus/{param1}', [MatakuliahController::class, 'destroy']);

//P3
Route::get('/home', [HomeController::class, 'index']);
Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('/auth', [HomeController::class, 'index']);
Route::post('auth/store', [QuestionController::class, 'store'])
    ->name('question.store');

use Illuminate\Support\Facades\Route;

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

// // Contoh route dashboard setelah login berhasil
// Route::get('/dashboard', function () {
//     return 'Selamat datang di dashboard!';
// })->name('dashboard'); // untuk memberikan nama yang bakal dipanggil di controller



Route::get('dashboard', [DashBoardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

Route::resource('user', UserController::class);
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
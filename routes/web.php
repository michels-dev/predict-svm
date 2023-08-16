<?php


use App\Models\Prediksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\ChartController;

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

Route::get('/', function () {
    $jumlahdata = Prediksi::count();
    // tampil data stroke
    $jumlahstroke = Prediksi::where('stroke','0')->count();
    $jumlahtstroke = Prediksi::where('stroke','1')->count();
    return view('welcome', compact('jumlahdata','jumlahstroke','jumlahtstroke'));

})->middleware('auth');

// hak akses
Route::group(['middleware' => ['auth','hakakses:admin']], function () {
    // tampil data
Route::get('/stroke',[PrediksiController::class,'index'])->name('stroke');
});

// Menambah Data
Route::get('/tdstroke', [PrediksiController::class, 'tdstroke'])->name('tdstroke');
Route::post('/insertstroke', [PrediksiController::class, 'insertstroke'])->name('insertstroke');

// update data
Route::get('/tampildata/{id}', [PrediksiController::class, 'tampildata'])->name('tampildata');
Route::post('/updatedata/{id}', [PrediksiController::class, 'updatedata'])->name('updatedata');

// delete data
Route::get('/delete/{id}',[PrediksiController::class,'delete'])->name('delete');

// import excel
Route::post('/importexcel',[PrediksiController::class,'importexcel'])->name('importexcel');

// login
Route::get('/login',[loginController::class,'login'])->name('login');
// proses login
Route::post('/loginproses',[loginController::class,'loginproses'])->name('loginproses');

// register
Route::get('/register',[loginController::class,'register'])->name('register');
// simpan data register ke dalam database
Route::post('/registerdata',[loginController::class,'registerdata'])->name('registerdata');

// LOGOUT
Route::get('/logout',[loginController::class,'logout'])->name('logout');

// predict
Route::get('/predict-form',[PrediksiController::class,'predictForm'])->name('predict.form');
Route::post('/predict',[PrediksiController::class,'predict'])->name('predict.submit');

// delete all data
Route::get('/deleteall',[PrediksiController::class,'deleteall'])->name('deleteall');

// form panduan
Route::get('/panduan',[PrediksiController::class,'panduan'])->name('panduan');

// export pdf
Route::get('/exportpdf',[PrediksiController::class,'exportpdf'])->name('exportpdf');

// export excel
Route::get('/exportexcel',[PrediksiController::class,'exportexcel'])->name('exportexcel');

// Route::get('/', [ChartController::class,'index']);

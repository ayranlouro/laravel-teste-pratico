<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
Route::post('/admin', [App\Http\Controllers\Admin\AdminController::class, 'update'])->name('update');
Route::post('/admin/edit', [App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('edit');

Route::get('/manter', [App\Http\Controllers\ManterController::class, 'index'])->name('manter');

Route::get('/categoria', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categoria');

Route::get('/marcas', [App\Http\Controllers\MarcasController::class, 'index'])->name('marcas');

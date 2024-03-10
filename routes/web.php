<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin..dashboard.index');
})->name('dashboard')->middleware(['auth','is_admin']);

Route::middleware(['auth','is_admin'])->group(function(){
    // Category Controller 
    Route::get('/dashboard/category',[CategoryController::class, 'index'])->name('dashboard.category');
    Route::post('/dashboard/category/insert',[CategoryController::class, 'store'])->name('dashboard.category.store');
    Route::get('/dashboard/category/view/{slug}',[CategoryController::class, 'view'])->name('dashboard.category.view');
    Route::get('/dashboard/category/edit/{slug}',[CategoryController::class, 'edit'])->name('dashboard.category.edit');
    Route::post('/dashboard/category/update',[CategoryController::class, 'update'])->name('dashboard.category.update');
    Route::delete('/dashboard/category/delete/{id}',[CategoryController::class, 'deleteI'])->name('dashboard.category.delete');
    Route::delete('/dashboard/category/softdel',[CategoryController::class, 'softdel'])->name('dashboard.category.softdel');
    // Route::get('/dashboard/category','CategoryController@index')->name('dashboard.category');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

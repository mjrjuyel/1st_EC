<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;

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
    return view('admin.dashboard.index');
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

    // Sub Category Part =============
    Route::get('/dashboard/subcategory',[SubCategoryController::class, 'index'])->name('dashboard.subcategory');
    Route::post('/dashboard/subcategory/insert',[SubCategoryController::class, 'store'])->name('dashboard.subcategory.store');
    Route::get('/dashboard/subcategory/view/{slug}',[SubCategoryController::class, 'view'])->name('dashboard.subcategory.view');
    Route::get('/dashboard/subcategory/edit/{slug}',[SubCategoryController::class, 'edit'])->name('dashboard.subcategory.edit');
    Route::post('/dashboard/subcategory/update',[SubCategoryController::class, 'update'])->name('dashboard.subcategory.update');
    Route::delete('/dashboard/subcategory/delete/{id}',[SubCategoryController::class, 'deleteI'])->name('dashboard.subcategory.delete');
    Route::delete('/dashboard/subcategory/softdel',[SubCategoryController::class, 'softdel'])->name('dashboard.subcategory.softdel');

    // Child Category Part =============
    Route::get('/dashboard/childcategory',[ChildCategoryController::class, 'index'])->name('dashboard.childcategory');
    Route::post('/dashboard/childcategory/insert',[ChildCategoryController::class, 'store'])->name('dashboard.childcategory.store');
    Route::get('/dashboard/childcategory/view/{slug}',[ChildCategoryController::class, 'view'])->name('dashboard.childcategory.view');
    Route::get('/dashboard/childcategory/edit/{slug}',[ChildCategoryController::class, 'edit'])->name('dashboard.childcategory.edit');
    Route::post('/dashboard/childcategory/update',[ChildCategoryController::class, 'update'])->name('dashboard.childcategory.update');
    Route::delete('/dashboard/childcategory/delete/{id}',[ChildCategoryController::class, 'deleteI'])->name('dashboard.childcategory.delete');
    Route::delete('/dashboard/childcategory/softdel',[ChildCategoryController::class, 'softdel'])->name('dashboard.childcategory.softdel');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

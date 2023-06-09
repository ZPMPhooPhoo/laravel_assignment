<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

// Route::get('/blog', function () {
//     return view('blog.index');
// });

//Route::get('/blog', [BlogController::class, 'get']);



Route::prefix('admin')->group(function(){
    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('blog/update/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::post('blog/delete/{blog}', [BlogController::class, 'delete'])->name('blog.delete');
    Route::get('blog/show/{blog}', [BlogController::class, 'show'])->name('blog.show');

    Route::resource('/blogs', BlogsController::class);
    Route::resource('/post', PostController::class);

    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::get('admin/widget', [AdminController::class, 'widget'])->name('admin.widget');
    Route::get('admin/datatable', [AdminController::class, 'datatable'])->name('admin.datatable');

    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user', UserController::class);
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

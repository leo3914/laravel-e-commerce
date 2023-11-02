<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

// Route::get('/', function () {
//     return view('index');
//     // session()->flush();
// });

Auth::routes();

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/product-detail/{id}' ,[ProductController::class, 'detail'])->name('product.detail');

// users
Route::middleware('auth', 'user-access:0')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/detail-storage', [ProductController::class, 'detailStorage'])->name('detail.storage');
    Route::get('/detail-qty', [ProductController::class, 'detailQty'])->name('detail.qty');
});

// admin delivery supplier
Route::middleware('auth', 'user-access:1')->group(function(){
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/role-form', [HomeController::class, 'roleForm'])->name('role.form');
    Route::post('/admin/add-role', [HomeController::class, 'addRole'])->name('add.role');
    Route::get('/admin/product-form', [ProductController::class, 'productForm'])->name('product.form');
    Route::post('/admin/add-product', [ProductController::class, 'addProduct'])->name('add.product');
    Route::get('/admin/qcs-form', [ProductController::class, 'qcsForm'])->name('qcs.form');
    Route::post('/admin/add-qcs', [ProductController::class, 'addQcs'])->name('add.qcs');
});

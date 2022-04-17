<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// dashboard
Route::middleware('auth')->group(function () {
    // Route::get('/{page}', [AdminController::class, 'index']);

    // invoices 
    Route::resource('invoices', InvoiceController::class);

    // sections
    Route::resource('sections', SectionController::class)->except(['show', 'create']);

    // products
    Route::resource('products', ProductController::class)->except(['show', 'create']);
    // getProductData
    Route::get('product/{section}', [ProductController::class, 'getProductData'])->name('section.products');
});

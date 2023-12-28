<?php

use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseRecordsController;
use App\Http\Controllers\PurchaseTransactionController;
use App\Http\Controllers\SaleRecordController;
use App\Http\Controllers\SaleTransactionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\TransactionReportController;
use App\Http\Controllers\TargetPenjualanController;
use App\Models\SaleTarget;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/minimarket/manage_goods', [ProductController::class, 'index'])->name('minimarket.manage_goods');
    Route::get('/minimarket/manage_goods/create', [ProductController::class, 'create'])->name('minimarket.manage_goods.create');
    Route::post('/minimarket/manage_goods', [ProductController::class, 'store'])->name('minimarket.manage_goods.store');
    Route::get('/minimarket/manage_goods/{id}/edit', [ProductController::class, 'edit'])->name('minimarket.manage_goods.edit');
    Route::match(['put', 'patch'],'/minimarket/manage_goods/{id}', [ProductController::class, 'update'])->name('minimarket.manage_goods.update');
    Route::delete('/minimarket/manage_goods/{id}', [ProductController::class, 'destroy'])->name('minimarket.manage_goods.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/minimarket/manage_goods/transaction/create', [PurchaseTransactionController::class, 'create'])->name('minimarket.manage_goods.transaction.create');
    Route::post('/minimarket/manage_goods/transaction', [PurchaseTransactionController::class, 'store'])->name('minimarket.manage_goods.transaction.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/minimarket/manage_goods/suppliers', [SupplierController::class, 'index'])->name('minimarket.manage_goods.suppliers');
    Route::get('/minimarket/manage_goods/suppliers/create', [SupplierController::class, 'create'])->name('minimarket.manage_goods.suppliers.create');
    Route::post('/minimarket/manage_goods/suppliers', [SupplierController::class, 'store'])->name('minimarket.manage_goods.suppliers.store');
    Route::get('/minimarket/manage_goods/suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('minimarket.manage_goods.suppliers.edit');
    Route::match(['put', 'patch'],'/minimarket/manage_goods/suppliers/{id}', [SupplierController::class, 'update'])->name('minimarket.manage_goods.suppliers.update');
    Route::delete('/minimarket/manage_goods/suppliers/suppliers/{id}', [SupplierController::class, 'destroy'])->name('minimarket.manage_goods.suppliers.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/minimarket/manage_transactions', [SaleTransactionController::class, 'index'])->name('minimarket.manage_transactions');
    Route::get('/minimarket/manage_transactions/create', [SaleTransactionController::class, 'create'])->name('minimarket.manage_transactions.create');
    Route::post('/minimarket/manage_transactions', [SaleTransactionController::class, 'store'])->name('minimarket.manage_transactions.store');
    Route::get('/minimarket/manage_transactions/{id}/edit', [SaleTransactionController::class, 'edit'])->name('minimarket.manage_transactions.edit');
    Route::match(['put', 'patch'],'/minimarket/manage_transactions/{id}', [SaleTransactionController::class, 'update'])->name('minimarket.manage_transactions.update');
    Route::delete('/minimarket/manage_transactions/{id}', [SaleTransactionController::class, 'destroy'])->name('minimarket.manage_transactions.destroy');
    Route::get('/get-product/{productName}', [SaleTransactionController::class, 'getProductPrice']);
});

Route::middleware('auth')->group(function () {
    Route::get('/minimarket/Records/purchase', [PurchaseRecordsController::class, 'index'])->name('minimarket.Records.purchase');
});

Route::middleware('auth')->group(function () {
    Route::get('/minimarket/Records/sale', [SaleRecordController::class, 'index'])->name('minimarket.Records.sale');
});

Route::middleware('auth')->group(function () {
    Route::get('/minimarket/manage_transactions/report', [TransactionReportController::class, 'index'])->name('minimarket.manage_transactions.report');
});

Route::middleware('auth')->group(function () {
    Route::get('/get-discount/{discountName}', [DiscountController::class, 'getDiscount'])->name('get-discount');
    Route::get('/minimarket/manage_transactions/discount', [DiscountController::class, 'index'])->name('minimarket.manage_transactions.discount');
    Route::get('/minimarket/manage_transactions/discount/create', [DiscountController::class, 'create'])->name('minimarket.manage_transactions.discount.create');
    Route::post('/minimarket/manage_transactions/discount', [DiscountController::class, 'store'])->name('minimarket.manage_transactions.discount.store');
    Route::get('/minimarket/manage_transactions/{id}/edit', [DiscountController::class, 'edit'])->name('minimarket.manage_transactions.discount.edit');
    Route::match(['put', 'patch'],'/minimarket/manage_transactions/{id}', [DiscountController::class, 'update'])->name('minimarket.manage_transactions.discount.update');
    Route::delete('/minimarket/manage_transactions/{id}', [DiscountController::class, 'destroy'])->name('minimarket.manage_transactions.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/minimarket/manager', [TargetController::class, 'index'])->name('minimarket.manager');
});


require __DIR__.'/auth.php';

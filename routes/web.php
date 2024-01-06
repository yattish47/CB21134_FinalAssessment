<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

 // BCS3453 [PROJECT]-SEMESTER 2324/1
    // Student ID: CB21134
    // Student Name: Yattish A/L Jaya Nanda Kumar

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
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('category', [CategoryController::class, 'viewCategoryList'])->middleware(['auth', 'verified'])->name('category');


Route::get('category/newCategory', function () {
    return view('newCategory');
})->middleware(['auth', 'verified'])->name('newCategory');

Route::post('category/newCategory', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('addCategory');

Route::get('category/editCategory/{id}', [CategoryController::class, 'fetch'])->middleware(['auth', 'verified'])->name('editCategory');

Route::post('category/editCategory/{id}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('updateCategory');

Route::get('category/deleteCategory/{id}', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified'])->name('deleteCategory');

Route::get('transaction', [TransactionController::class, 'viewTransactionList'])->middleware(['auth', 'verified'])->name('transaction');


Route::get('transaction/newIncome', [TransactionController::class, 'getCategoryListForIncome'])->middleware(['auth', 'verified'])->name('newIncome');

Route::post('transaction/newIncome', [TransactionController::class, 'newIncome'])->middleware(['auth', 'verified'])->name('addIncome');

Route::get('transaction/newExpense', [TransactionController::class, 'getCategoryListForExpense'])->middleware(['auth', 'verified'])->name('newExpense');

Route::post('transaction/newExpense', [TransactionController::class, 'newExpense'])->middleware(['auth', 'verified'])->name('addExpense');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

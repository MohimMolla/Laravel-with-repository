<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
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

Route::get('test',[TestController::class,'index'])->name('tast');
Route::post('user-create',[TestController::class,'store'])->name('usercreate');
Route::any('/user-edit/{id}',[TestController::class,'edit'])->name('user-edit');
Route::any('/user-update/{id}',[TestController::class,'update'])->name('user-update');
// Route::any('/user-delete/{id}',[TestController::class,'delete'])->name('user-delete');
Route::any('/user-delete/{id}',[TestController::class, 'delete'])->name('user-delete');

require __DIR__.'/auth.php';

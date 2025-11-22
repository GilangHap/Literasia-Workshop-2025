<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('welcome');
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');
Route::get('/buku/{id}', [App\Http\Controllers\BookController::class, 'show'])->name('book.detail');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/hubungi', function () {
    return view('hubungi');
})->name('hubungi');

Route::get('/dashboard', [BerandaController::class, 'index'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Password change page
    Route::get('/ganti-password', function () {
        return view('profile.change-password');
    })->name('profile.password');
    
    // Member profile page
    Route::get('/profil-saya', [App\Http\Controllers\MemberProfileController::class, 'index'])->name('member.profile');
    
    // Member borrow history
    Route::get('/riwayat', [App\Http\Controllers\MemberBorrowController::class, 'index'])->name('riwayat');
    
    // Borrow routes
    Route::get('/pinjam/{bookId}', [App\Http\Controllers\BorrowController::class, 'create'])->name('borrow.create');
    Route::post('/pinjam/{bookId}', [App\Http\Controllers\BorrowController::class, 'store'])->name('borrow.store');
});

require __DIR__.'/auth.php';

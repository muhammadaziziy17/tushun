<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PresentationController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('welcome');
    }
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/presentation/{id}', [PresentationController::class, 'show'])->name('presentation.show');
Route::get('/presentation/by-id/{id}', [PresentationController::class, 'showPresentationById'])->name('presentation.show_by_id');
Route::post('/upload', [PresentationController::class, 'upload'])->name('presentation.upload');
Auth::routes();

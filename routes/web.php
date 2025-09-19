<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\InquiryController;

Route::get('/', [PageController::class, 'show'])->defaults('page', 'home')->name('home');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties');
Route::get('/property/{id}', [PropertyController::class, 'show'])->name('property.show');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/{page}', [PageController::class, 'show'])
    ->where('page', 'about|services|contact')
    ->name('page.show');

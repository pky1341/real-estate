<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', fn() => app(PageController::class)->show('home'))->name('home');
Route::get('/{page}', [PageController::class, 'show'])
    ->where('page', 'properties|about|services|contact')
    ->name('page.show');

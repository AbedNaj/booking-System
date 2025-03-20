<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::view('app/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'app/settings/profile');

    Route::get('app/settings/profile', Profile::class)->name('settings.profile');
    Route::get('app/settings/password', Password::class)->name('settings.password');
    Route::get('app/settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';

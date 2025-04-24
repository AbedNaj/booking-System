<?php

use App\Http\Middleware\CustomerAuthenticate;
use App\Livewire\Main\Auth\Login;
use App\Livewire\Main\Auth\Register;
use App\Livewire\Main\BookingStatus\BookingConfirmation;
use App\Livewire\Main\BookingStatus\Pending;
use App\Livewire\Main\Customer\CustomerAccount;
use App\Livewire\Main\Customer\CustomerBookings;

use App\Livewire\Main\Customer\CustomerSettings;
use App\Livewire\Main\Tenant\TenantServiceList;
use App\Livewire\Main\Tenant\TenantServiceShow;


use Illuminate\Support\Facades\Route;







Route::prefix('/{tenants:slug}')->group(function () {

    // Customer Auth
    Route::get('/login', Login::class)->name('customer.login');
    Route::get('/register', Register::class)->name('customer.register');

    // Services 
    Route::get('/services', TenantServiceList::class)->name('tenant.service.list');
    Route::get('{service}/service', TenantServiceShow::class)->name('tenant.service.show');

    // Booking
    Route::get('/booking/confirmation/{confirmation_code}', BookingConfirmation::class)->name('booking.confirmation');
    Route::get('/booking/pending', Pending::class)->name('booking.pending');


    // Auth Routes 
    Route::middleware([CustomerAuthenticate::class])->group(function () {

        //Customer Profile
        Route::get('/profile/account', CustomerAccount::class)->name('customer.account');
        Route::get('/profile/bookings', CustomerBookings::class)->name('customer.bookings');
        Route::get('/profile/settings', CustomerSettings::class)->name('customer.settings');
    });
});

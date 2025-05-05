<?php

use App\Http\Middleware\EmployeeAuthenticate;
use App\Http\Middleware\EmployeeUnauthenticated;
use App\Livewire\App\EmployeeAccount\EmployeeBookingDetails;
use App\Livewire\App\EmployeeAccount\EmployeeBookings;
use App\Livewire\App\EmployeeAccount\EmployeeDashboard;
use App\Livewire\App\EmployeeAccount\EmployeeLogin;
use App\Livewire\App\Employees\EmployeeAccount;
use Illuminate\Support\Facades\Route;


Route::prefix('app/employee')->name('app.')->group(function () {

    Route::middleware(EmployeeAuthenticate::class)->group(function () {

        Route::get('dashboard', EmployeeDashboard::class)->name('employee.dashboard');
        Route::get('bookings', EmployeeBookings::class)->name('employee.bookings');
        Route::get('bookings/{booking}', EmployeeBookingDetails::class)->name('employee.booking.details');

        Route::get('/account', \App\Livewire\App\EmployeeAccount\EmployeeAccount::class)->name('employee.account');
    });

    Route::middleware(EmployeeUnauthenticated::class)->group(function () {

        Route::get('login', EmployeeLogin::class)->name('employee.login');
    });
});

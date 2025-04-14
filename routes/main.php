<?php

use App\Http\Middleware\TenantSessionMiddleware;
use App\Livewire\Main\Auth\Login;
use App\Livewire\Main\Auth\Register;
use App\Livewire\Main\Tenant\TenantServiceList;
use App\Livewire\Main\Tenant\TenantServiceShow;

use Illuminate\Support\Facades\Route;







Route::prefix('/{tenants:slug}')->group(function () {


    Route::get('/login', Login::class)->name('customer.login');
    Route::get('/register', Register::class)->name('customer.register');
    Route::get('/services', TenantServiceList::class)->name('tenant.service.list');
    Route::get('{service}/service', TenantServiceShow::class)->name('tenant.service.show');

    Route::middleware('auth:customer')->group(function () {});
});

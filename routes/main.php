<?php

use App\Livewire\Main\Tenant\TenantServiceList;
use App\Livewire\Main\Tenant\TenantServiceShow;

use Illuminate\Support\Facades\Route;



Route::get('/{tenants:slug}/services', TenantServiceList::class)->name('tenant.service.list');
Route::get('/{service}/service', TenantServiceShow::class)->name('tenant.service.show');

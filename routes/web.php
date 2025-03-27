<?php

use App\Livewire\App\Category\CategoryShow;
use App\Livewire\App\Category\Index;
use App\Livewire\App\Employees\EmployeesIndex;
use App\Livewire\App\Employees\EmployeesShow;
use App\Livewire\App\EmployeeType\EmployeeTypeIndex;
use App\Livewire\App\EmployeeType\EmployeeTypeShow;
use App\Livewire\App\Services\ServiceIndex;
use App\Livewire\App\Services\ServiceShow;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Services;
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

Route::prefix('app/')->middleware('auth')->name('app.')->group(function () {

    // Categories
    Route::get('category', Index::class)->name('category.index');
    Route::get('category/show/{category}', CategoryShow::class)->name('category.show');

    // services
    Route::get('services', ServiceIndex::class)->name('services.index');
    Route::get('services/show/{service}', ServiceShow::class)->name('services.show');

    // Employees
    Route::get('employees', EmployeesIndex::class)->name('employees.index');
    Route::get('employee/show/{employees}', EmployeesShow::class)->name('employees.show');
    // Employees Types

    Route::get('employees/types', EmployeeTypeIndex::class)->name('employees-types.index');
    Route::get('employees/types/show/{employeeTypes}', EmployeeTypeShow::class)->name('employees-types.show');
});




require __DIR__ . '/auth.php';

<?php

use App\Livewire\App\Assignment\AssignmentEdit;
use App\Livewire\App\Assignment\AssignmentIndex;
use App\Livewire\App\Assignment\Assignmentshow;
use App\Livewire\App\Booking\BookingIndex;
use App\Livewire\App\Booking\BookingShow;
use App\Livewire\App\Category\CategoryShow;
use App\Livewire\App\Category\Index;
use App\Livewire\App\Customers\CustomersIndex;
use App\Livewire\App\Customers\CustomersShow;
use App\Livewire\App\Dashboard\Dashboard;
use App\Livewire\App\EmployeeAccount\EmployeeLogin;
use App\Livewire\App\Employees\EmployeeAccount;
use App\Livewire\App\Employees\EmployeesIndex;
use App\Livewire\App\Employees\EmployeesShow;
use App\Livewire\App\EmployeeType\EmployeeTypeIndex;
use App\Livewire\App\EmployeeType\EmployeeTypeShow;
use App\Livewire\App\Services\ServiceAvailability;
use App\Livewire\App\Services\ServiceIndex;
use App\Livewire\App\Services\ServiceShow;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Booking;
use App\Livewire\Settings\Employee;
use App\Livewire\Settings\General;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Service as SettingsService;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');





Route::middleware(['auth:web'])->group(function () {
    Route::redirect('settings', 'app/settings/profile');

    // Settings
    Route::get('app/settings/profile', Profile::class)->name('settings.profile');
    Route::get('app/settings/password', Password::class)->name('settings.password');
    Route::get('app/settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('app/settings/general', General::class)->name('settings.general');
    Route::get('app/settings/service', SettingsService::class)->name('settings.service');
    Route::get('app/settings/employee', Employee::class)->name('settings.employee');

    // dashboard
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});



Route::prefix('app/')->middleware('auth:web')->name('app.')->group(function () {

    // Categories
    Route::get('category', Index::class)->name('category.index');
    Route::get('category/show/{category}', CategoryShow::class)->name('category.show');

    // services
    Route::get('services', ServiceIndex::class)->name('services.index');
    Route::get('services/show/{service}', ServiceShow::class)->name('services.show');
    Route::get('service/availability/{service}', ServiceAvailability::class)->name('services.availability');
    // Employees
    Route::get('employees', EmployeesIndex::class)->name('employees.index');
    Route::get('employee/show/{employee}', EmployeesShow::class)->name('employees.show');
    Route::get('employee/show/{employee}/account', EmployeeAccount::class)->name('employees.account');

    // Employees Types
    Route::get('employees/types', EmployeeTypeIndex::class)->name('employees-types.index');
    Route::get('employees/types/show/{employeeTypes}', EmployeeTypeShow::class)->name('employees-types.show');



    // Assignments
    Route::get('assignments', AssignmentIndex::class)->name('assignments.index');
    Route::get('assignments/{service}/show', Assignmentshow::class)->name('assignments.show');
    Route::get('assignments/{assignment}/edit', AssignmentEdit::class)->name('assignments.edit');

    // customers
    Route::get('/customers', CustomersIndex::class)->name('customers.index');
    Route::get('/customers/{customer}/show', CustomersShow::class)->name('customers.show');

    // bookings
    Route::get('/bookings', BookingIndex::class)->name('bookings.index');
    Route::get('/bookings/{booking}/show', BookingShow::class)->name('bookings.show');
});


require __DIR__ . '/auth.php';

require __DIR__ . '/main.php';

require __DIR__ . '/employee.php';

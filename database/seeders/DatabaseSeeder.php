<?php

use App\Livewire\App\Services\ServiceAvailability;
use App\Models\Assignment;
use App\Models\Booking;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Customer;
use App\Models\service_availabilities;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Role;
use App\Models\EmployeeType;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Settings;
use App\Enums\SettingKey;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->value('id');
        $customerRole = Role::where('name', 'customer')->value('id');
        $employeeRole = Role::where('name', 'Employee')->value('id');

        $StartTime = '08:00:00';
        $EndTime = '16:00:00';

        // tenant
        $tenant1 = Tenant::factory()->create([
            'name' => 'demo_company',
            'slug' => 'demo_company',
            'email' => 'admin@example.com',
            'address' => 'admin address',
            'phone' => '1234567890',
        ]);

        // admin
        User::factory()->create([
            'name' => 'demo_company',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole,
            'tenant_id' => $tenant1->id,
        ]);

        // employee types
        $employeeTypes = EmployeeType::factory()->count(3)->create([
            'tenant_id' => $tenant1->id,
        ]);

        // categories
        $categories = Category::factory()->count(5)->create([
            'tenant_id' => $tenant1->id,
        ]);

        // 3 employees with specific emails/passwords
        $employees = collect();
        for ($i = 1; $i <= 3; $i++) {
            $email = "employee{$i}@example.com";

            $user = User::factory()->create([
                'name' => "Employee {$i}",
                'email' => $email,
                'password' => Hash::make('password'),
                'role_id' => $employeeRole,
                'tenant_id' => $tenant1->id,
            ]);

            $employee = Employee::factory()->create([
                'tenant_id' => $tenant1->id,
                'employee_type_id' => $employeeTypes->random()->id,
                'user_id' => $user->id,
                'email' => $email,
                'name' => $user->name,
            ]);

            $employees->push($employee);
        }

        // 5 services with availabilities
        $services = collect();
        for ($s = 0; $s < 5; $s++) {
            $service = Service::factory()->create([
                'tenant_id' => $tenant1->id,
                'category_id' => $categories->random()->id,
            ]);

            for ($d = 0; $d < 7; $d++) {
                service_availabilities::create([
                    'tenant_id' => $tenant1->id,
                    'service_id' => $service->id,
                    'day_of_week' => $d,
                    'start_time' => $StartTime,
                    'end_time' => $EndTime,
                ]);
            }

            foreach ($employees as $employee) {
                Assignment::create([
                    'tenant_id' => $tenant1->id,
                    'service_id' => $service->id,
                    'employee_id' => $employee->id,
                ]);
            }
            $services->push($service);
        }

        // customer
        $customerUser = User::factory()->create([
            'role_id' => $customerRole,
            'tenant_id' => $tenant1->id,
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
        ]);

        $customer = Customer::factory()->create([
            'tenant_id' => $tenant1->id,
            'user_id' => $customerUser->id,
            'email' => $customerUser->email,
        ]);

        // bookings for each employee
        foreach ($employees as $employee) {
            for ($i = 0; $i < 15; $i++) {
                $service = $services->random();
                $dayOffset = fake()->numberBetween(0, 6);
                $bookingDate = Carbon::today()->addDays($dayOffset);

                $startHour = fake()->numberBetween(8, 16);
                $duration = fake()->randomElement([30,  60]);
                $startTime = Carbon::createFromTime($startHour, 0);
                $endTime = (clone $startTime)->addMinutes($duration);

                Booking::create([
                    'tenant_id' => $tenant1->id,
                    'customer_id' => $customer->id,
                    'service_id' => $service->id,
                    'employee_id' => $employee->id,
                    'date' => $bookingDate->format('Y-m-d'),
                    'start_time' => $startTime->format('H:i:s'),
                    'end_time' => $endTime->format('H:i:s'),
                    'duration' => $duration,
                    'price' => fake()->numberBetween(20, 200),
                    'status' => 'confirmed',
                    'notes' => fake()->optional()->sentence(),
                ]);
            }
        }

        Settings::insert([
            [
                'key' => SettingKey::siteName->value,
                'value' => 'Demo Company',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::siteName->group(),
            ],
            [
                'key' => SettingKey::siteEmail->value,
                'value' => 'contact@demo-company.com',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::siteEmail->group(),
            ],
            [
                'key' => SettingKey::sitePhone->value,
                'value' => '+1 234 567 890',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::sitePhone->group(),
            ],
            [
                'key' => SettingKey::siteAddress->value,
                'value' => '456 Wellness Street, Los Angeles, CA',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::siteAddress->group(),
            ],
            [
                'key' => SettingKey::mainHeading->value,
                'value' => 'Welcome to Demo Company',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::mainHeading->group(),
            ],
            [
                'key' => SettingKey::subHeading->value,
                'value' => 'Your trusted partner for beauty & wellness',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::subHeading->group(),
            ],
            [
                'key' => SettingKey::projectDesc->value,
                'value' => 'At Demo Company, we provide professional wellness and beauty services including hair styling, massage, and skincare. Book your appointment online and experience top-quality care.',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::projectDesc->group(),
            ],
            [
                'key' => SettingKey::workingFrom->value,
                'value' => '09:00',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::workingFrom->group(),
            ],
            [
                'key' => SettingKey::workingTo->value,
                'value' => '18:00',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::workingTo->group(),
            ],
            [
                'key' => SettingKey::allowCancel->value,
                'value' => '1',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::allowCancel->group(),
            ],
            [
                'key' => SettingKey::CancelHours->value,
                'value' => '6',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::CancelHours->group(),
            ],
            [
                'key' => SettingKey::cancelPolicy->value,
                'value' => 'To cancel your booking, please let us know at least 6 hours in advance.',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::cancelPolicy->group(),
            ],
            [
                'key' => SettingKey::employeePassword->value,
                'value' => 'securepass123',
                'tenant_id' => $tenant1->id,
                'group' => SettingKey::employeePassword->group(),
            ],
        ]);
    }
}

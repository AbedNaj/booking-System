<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $tenant =  Tenant::factory()->create([
            'name' => 'abd',
            'slug' => 'abd',
            'email' => 'najajrahabd@gmail.com',
            'address' => 'nahalin',
            'phone' => '0515500311',

        ]);

        User::factory()->create([
            'name' => 'abd',
            'email' => 'najajrahabd@gmail.com',
            'password' => Hash::make('123'),
            'role_id' => '2',
            'tenant_id' => $tenant->id,
        ]);
    }
}

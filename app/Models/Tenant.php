<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    /** @use HasFactory<\Database\Factories\TenantsFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {

        return $this->hasMany(User::class);
    }

    public function category()
    {

        return $this->hasMany(Category::class);
    }
    public function employeeTypes()
    {

        return $this->hasMany(EmployeeType::class);
    }
    public function employees()
    {

        return $this->hasMany(Employee::class);
    }

    public function employeeServices()
    {

        return $this->hasMany(Assignment::class);
    }

    public function customers()
    {

        return $this->hasMany(Customer::class);
    }
    public function services()
    {

        return $this->hasMany(Service::class);
    }
    public function bookings()
    {

        return $this->hasMany(Booking::class);
    }
}

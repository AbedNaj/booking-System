<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeesFactory> */
    use HasFactory;

    protected $guarded = ['id'];


    public function tenants()
    {

        return $this->belongsTo(Tenant::class);
    }
    public function employeeType()
    {

        return $this->belongsTo(EmployeeType::class);
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function user()
    {

        return  $this->BelongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeesFactory> */
    use HasFactory;

    protected $guarded = ['id'];


    public function tenants()
    {

        return $this->belongsTo(Tenants::class);
    }
    public function employeeTypes()
    {

        return $this->belongsTo(EmployeeTypes::class);
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }
}

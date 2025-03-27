<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
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

        return $this->hasMany(EmployeeTypes::class);
    }
}

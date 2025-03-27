<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTypes extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeTypesFactory> */
    use HasFactory;

    protected $guarded = ['id'];


    public function tenants()
    {

        return $this->belongsTo(Tenants::class);
    }
    public function employee()
    {

        return $this->hasMany(Employees::class);
    }
}

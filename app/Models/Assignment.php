<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeServiceFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}

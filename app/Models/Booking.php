<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $guarded = ['id', 'created_at'];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customers_id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'services_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employees_id');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenants::class, 'tenants_id');
    }
}

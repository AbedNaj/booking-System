<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    protected $guarded = ['id', 'created_at'];

    public function tenant()
    {
        return $this->belongsTo(Tenants::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
    public function service()
    {
        return $this->belongsTo(Services::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }
}

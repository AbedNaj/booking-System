<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    /** @use HasFactory<\Database\Factories\CustomersFactory> */
    use HasFactory;

    protected $guarded = ['id'];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenants::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}

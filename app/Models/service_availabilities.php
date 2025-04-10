<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_availabilities extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceAvailabilitiesFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    public function service()
    {
        return $this->belongsTo(Services::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenants::class);
    }
}

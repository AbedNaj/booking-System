<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServicesFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::ulid();
            }
        });
    }

    public $incrementing = false;
    protected $keyType = 'string';

    public function tenant()
    {

        return $this->belongsTo(Tenant::class);
    }
    public function category()
    {

        return $this->belongsTo(Category::class);
    }
    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }

    public function availability()
    {
        return $this->hasMany(service_availabilities::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

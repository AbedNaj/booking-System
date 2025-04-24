<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomersFactory> */
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
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}

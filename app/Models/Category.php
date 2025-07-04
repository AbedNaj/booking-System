<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $guarded = ['id'];


    public function service()
    {

        return $this->hasMany(Service::class);
    }

    public function tenant()
    {

        return $this->belongsTo(Tenant::class);
    }
}

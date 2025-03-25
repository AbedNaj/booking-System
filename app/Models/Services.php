<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    /** @use HasFactory<\Database\Factories\ServicesFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function tenant()
    {

        return $this->belongsTo(Tenants::class);
    }
    public function category()
    {

        return $this->belongsTo(Category::class);
    }
}

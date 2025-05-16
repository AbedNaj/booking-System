<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /** @use HasFactory<\Database\Factories\SettingsFactory> */
    use HasFactory;

    protected $guarded = ['id'];
    public static function createOrUpdateMany(array $keyValuePairs): void
    {
        foreach ($keyValuePairs as $key => $value) {
            static::updateOrCreate([
                'key' => $key,
                'tenant_id' => $value['tenant'],
            ], [
                'value' => $value['value'],

                'group' => $value['group']

            ]);
        }
    }
    public function tenant()
    {

        return $this->belongsTo(Tenant::class);
    }
}

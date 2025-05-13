<?php

namespace App\Enums;

enum ServiceStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';


    public function label(): string
    {
        return match ($this) {
            self::Active => __('services.active'),
            self::Inactive => __('services.inactive'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Active => 'green',
            self::Inactive => 'red',
        };
    }
}

<?php

namespace App\Enums;

enum BookingStatusEnum: string
{
    case PENDING    = 'pending';
    case CONFIRMED  = 'confirmed';
    case EXPIRED    = 'expired';
    case CANCELLED  = 'cancelled';
    case COMPLETED  = 'completed';
    case NO_SHOW    = 'no_show';
    case REJECTED   = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::PENDING    => __('booking.status_pending'),
            self::CONFIRMED  => __('booking.status_confirmed'),
            self::EXPIRED    => __('booking.status_expired'),
            self::CANCELLED  => __('booking.status_cancelled'),
            self::COMPLETED  => __('booking.status_completed'),
            self::NO_SHOW    => __('booking.status_no_show'),
            self::REJECTED   => __('booking.status_rejected'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING    => 'yellow',
            self::CONFIRMED  => 'blue',
            self::EXPIRED    => 'red',
            self::CANCELLED  => 'red',
            self::COMPLETED  => 'green',
            self::NO_SHOW    => 'orange',
            self::REJECTED   => 'rose',
        };
    }
}

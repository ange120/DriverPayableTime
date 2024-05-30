<?php

namespace App\Helpers;

class PayableTimeHelpers
{
    public static function calculatePayableTime($pickup, $dropoff)
    {
        $pickupTime = strtotime($pickup);
        $dropoffTime = strtotime($dropoff);

        $differenceInMinutes = round(($dropoffTime - $pickupTime) / 60);

        return max($differenceInMinutes, 0);
    }
}

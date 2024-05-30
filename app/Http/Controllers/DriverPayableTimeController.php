<?php

namespace App\Http\Controllers;

use App\Helpers\PayableTimeHelpers;
use App\Models\Trip;
use Illuminate\Http\Request;

class DriverPayableTimeController extends Controller
{
    public function index()
    {
        return response()->json(Trip::all());
    }

    public function calculatePayableTime(Request $request)
    {
        $trips = Trip::all();

        $driverPayableTimes = [];
        foreach ($trips as $trip) {
            if (!isset($driverPayableTimes[$trip->driver_id])) {
                $driverPayableTimes[$trip->driver_id] = 0;
            }
            $driverPayableTimes[$trip->driver_id] += PayableTimeHelpers::calculatePayableTime($trip->pickup, $trip->dropoff);
        }
        return response()->json($driverPayableTimes);
    }
}

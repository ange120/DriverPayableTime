<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DriverPayableTimeController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Trip::all());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function calculatePayableTime(Request $request): \Illuminate\Http\JsonResponse
    {
        $trips = Trip::all();

        $driverPayableTimes = [];

        foreach ($trips as $trip) {
            if (!isset($driverPayableTimes[$trip->driver_id])) {
                $driverPayableTimes[$trip->driver_id] = [];
            }
            $driverPayableTimes[$trip->driver_id][] = [
                'pickup' => strtotime($trip->pickup),
                'dropoff' => strtotime($trip->dropoff)
            ];
        }

        $uniqueDriverPayableTimes = [];

        foreach ($driverPayableTimes as $driver_id => $times) {
            usort($times, function($a, $b) {
                return $a['pickup'] <=> $b['pickup'];
            });

            $mergedTimes = [];
            foreach ($times as $time) {
                if (empty($mergedTimes) || end($mergedTimes)['dropoff'] < $time['pickup']) {
                    $mergedTimes[] = $time;
                } else {
                    $mergedTimes[count($mergedTimes) - 1]['dropoff'] = max(end($mergedTimes)['dropoff'], $time['dropoff']);
                }
            }

            $totalTime = 0;
            foreach ($mergedTimes as $time) {
                $totalTime += ($time['dropoff'] - $time['pickup']);
            }

            $uniqueDriverPayableTimes[$driver_id] = round($totalTime / 3600);
        }

        return response()->json($uniqueDriverPayableTimes);
    }
}

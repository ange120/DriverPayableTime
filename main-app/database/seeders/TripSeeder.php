<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = env('SEEDER_PATH');

        if (($handle = fopen($csvFile, 'r')) !== false) {
            $headers = fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== false) {
                $tripData = array_combine($headers, $data);

                Trip::create([
                    'driver_id' => $tripData['driver_id'],
                    'pickup' => $tripData['pickup'],
                    'dropoff' => $tripData['dropoff'],
                ]);
            }

            fclose($handle);
        }
    }
}

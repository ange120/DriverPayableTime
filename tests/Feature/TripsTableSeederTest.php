<?php

namespace Tests\Feature;

use App\Models\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TripsTableSeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_imports_trips_from_csv()
    {
        $this->artisan('db:seed', ['--class' => 'TripsTableSeeder']);

        $this->assertDatabaseCount('trips', 171);

        $trip = Trip::first();
        $this->assertNotNull($trip);
        $this->assertEquals(1, $trip->id);
    }
}

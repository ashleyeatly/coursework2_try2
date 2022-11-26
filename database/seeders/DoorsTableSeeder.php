<?php

namespace Database\Seeders;

use App\Models\Door;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = new Door();
        $d->name="Artium Main Door";
        $d->zone()->associate(Zone::find(1));  // Artium Zone
        $d->save();

        $d = new Door();
        $d->name="Artium Side Door";
        $d->zone()->associate(Zone::find(1)); // Artium Zone
        $d->save();

        $d = new Door();
        $d->name="Back Door";
        $d->save();

        $d = new Door();
        $d->name="Loft Door";
        $d->save();

        $createdDoors = Door::factory()->count(50)->create();

        // Now that we have created random doors, we will randomly place them in zones.
        // We also randomly skip some doors so they are not in any zone.

        // Get all the zones.
        $allZones = Zone::all();
        // Randomly associate zero or one random zone to each doors we created.
        $createdDoors->each(function ($d) use ($allZones) {
            // 50% chance of executing the body of the if.
            if (rand(0, 1) == 0) {
                // Get a random zone and place the doors in the zone.
                $randomZone = $allZones->random();
                $d->zone()->associate($randomZone);
                $d->save();
            }
        });
    }
}

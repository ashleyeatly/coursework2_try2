<?php

namespace Database\Seeders;

use App\Models\Door;
use App\Models\User;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $u = new User();
        $u->name = "Liam O'Reilly";
        $u->first_name = "Liam";
        $u->last_name = "O'Reilly";
        $u->administrator=true;
        $u->expires=Carbon::now()->addYear();
        $u->email="liamoreilly@example.com";
        $u->password=bcrypt('secret');
        $u->save();
        $u->doors()->attach(3); // Back Door
        $u->doors()->attach(4); // Loft Door
        $u->zones()->attach(1); // Artium Zone

        $u = new User();
        $u->name = "Joe Blogs";
        $u->first_name = "Joe";
        $u->last_name = "Blogs";
        $u->administrator=false;
        $u->expires=Carbon::now()->addWeek();
        $u->email="joeblogs@example.com";
        $u->password=bcrypt('secret');
        $u->save();

        $createdUsers = User::factory()->count(50)->create();

        // Now that we have created random users, we will randomly add doors and zones to them.

        // Get all the doors.
        $allDoors = Door::all();
        // Randomly attached up to 3 random doors to each user we created.
        $createdUsers->each(function ($u) use ($allDoors) {
            // Out of all the doors, pick up to 3 random ones and pull out their ids in an array.
            $randomDoorIdArray = $allDoors->random(rand(0,3))->pluck('id')->toArray();
            // Add the random doors to the user.
            $u->doors()->attach($randomDoorIdArray);
        });

        // Get all the zones.
        $allZones = Zone::all();
        // Randomly attached up to 3 random zones to each user we created.
        $createdUsers->each(function ($u) use ($allZones) {
            // Out of all the zones, pick up to 3 random ones and pull out their ids in an array.
            $randomZoneIdArray = $allZones->random(rand(0, 3))->pluck('id')->toArray();
            // Add the random zones to the user.
            $u->zones()->attach($randomZoneIdArray);
        });
    }
}

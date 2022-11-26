<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    public function run()
    {
        $z = new Zone();
        $z->name="Artium Zone";
        $z->save();

        Zone::factory()->count(10)->create();
    }
}

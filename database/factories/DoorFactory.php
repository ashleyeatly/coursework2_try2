<?php

namespace Database\Factories;

use App\Models\Door;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoorFactory extends Factory
{
    protected $model = Door::class;

    public function definition()
    {
        return [
            'name' => 'Door ' . fake()->unique()->randomNumber(3),
        ];
    }
}

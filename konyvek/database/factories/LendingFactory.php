<?php

namespace Database\Factories;

use App\Models\Copy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lending>
 */
class LendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'copy_id' => Copy::all()->random()->copy_id,
            'start' => fake()->date(),
            'end' => fake()->date(),
            'extension' => rand(0,1),
            'notice' => rand(0,3),
        ];
    }
}

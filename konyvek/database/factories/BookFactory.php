<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Stringable;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' => fake('hu_HU')->name(),
            'title' => fake('hu_HU')->sentence(),
            
        ];
    }
}

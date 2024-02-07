<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $repeats = 10;
        do {
            $book_id = Book::all()->random()->book_id;
            $user_id = User::all()->random()->id;
            $start = fake()->date();
            $res = Reservation::where('book_id', $book_id)
                ->where('user_id', $user_id)
                ->where('start', $start)
                ->get();
            $repeats--;
        } while ($repeats >= 0 && count($res) > 0);

        return [
            'book_id' => $book_id,
            'user_id' => $user_id,
            'start' => $start,
            'message' => rand(0, 1)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Binding;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\SeriesType;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'summary' => fake()->text(400),
            'number' => fake()->numberBetween(1, 200),
            'isbn_10' => fake()->randomNumber(5).fake()->randomNumber(5),
            'isbn_13' => fake()->randomNumber(5).fake()->randomNumber(5).fake()->randomNumber(3),
            'page_count' => fake()->randomNumber(3),
            'release_date' => fake()->date(),
            'series_type_id' => SeriesType::all()->random()->id,
            'publisher_id' => Publisher::all()->random()->id,
            'language_id' => Language::all()->random()->id,
            'binding_id' => Binding::all()->random()->id,
        ];
    }
}
